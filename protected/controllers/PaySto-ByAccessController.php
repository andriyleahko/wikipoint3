<?php
class ByAccessController extends Controller {
	public $layout = 'item_page';
	
	public function actionIndex() {
		$model = Baza812TypePasword::model ()->findAll ( array (
				'select' => '*',
				'condition' => 'price<>:price',
				'params' => array (':price' => 0) 
		) );
		$this->render ( 'index', array (
				'model' => $model 
		) );
	}
	
	public function actionBuy() {
		Yii::app()->session['order_id'] = '';
		$modelTypePasword = Baza812TypePasword::model ()->findAll ( array (
				'select' => '*',
				'condition' => 'price<>:price',
				'params' => array (':price' => 0) 
		) );
		
		if ($_POST) {
			$tarif = strip_tags ( $_POST ['tarif'] ); // id from table Baza812TypePasword
			$phone = strip_tags ( $_POST ['phone'] ); // phone user
		
			if (! isset ( $phone ) || ! $phone) {  // phone validation
				$this->render ( 'index', array (
						'model' => $modelTypePasword,
						'not_phone' => 'введите телефон' 
				) );
				exit ();
			}
			
			$modelUser = Baza812User::model ()->find ( array (
					'select' => '*',
					'condition' => 'phone=:phone',
					'params' => array (':phone' => $phone) 
			) );

			$test_for_tarif=False;
			foreach ($modelTypePasword as $mod){
				if ($mod->id==$tarif){
					$test_for_tarif=TRUE;
					$price=$mod->price;
					$description=$mod->name; // tarif (type pasword) description
				}
			}

			if (!$test_for_tarif){
				$this->render ( 'index', array (
						'model' => $modelTypePasword,
						'not_tarif' => 'выберите тариф',
				) );
				exit();
			}

			if ($modelUser) { 
				// тут ми просто маємо його ід
					$id_user = $modelUser->id;
				} else { // New User
					// реєструвати юзера і вернути його ід
					$user = new Baza812User();
					$user->name = '';
					$user->phone = $phone;
					$user->email = '';
					$user->about_me = '';
					$user->ids_object='';
					$user->save(false);
					$id_user = $user->id;
				
				}
			
			// тут ми маємо ід юзера і ід тип пароля (тариф)
			// це все пишемо в таблицю ордерів і статус 0 .... і дістаємо ід
			$modelOrder = new Baza812UserBuyOrders();
			$modelOrder->id_user = $id_user;
			$modelOrder->id_type_pasword = $tarif;
			$modelOrder->status = 0;
			$modelOrder->pasword = 0; 
			$modelOrder->save(false);
			$order_id=$modelOrder->id;
				
			$data = array(
					'summ' => $price, // з бази по тарифах
					'order_id' => $order_id, // id ордера
					'description' => $description // .....
			);
			
			
			Yii::app()->session['order_id'] = $order_id;
			Yii::app()->paysto->genere_form($data);
		}
	}
	
	public function actionPay_paysto_check_url() {
		
		echo Yii::app()->paysto->check_paid();
		exit ();
	}
	
	public function actionPay_callback_paysto() {
		
		if ($id_order = Yii::app()->paysto->check_paid()) {
			// по ід ми дістаємо наш ордер з бд
			$modelOrders = Baza812UserBuyOrders::model()->findByPk($id_order); 
			
			
			if ($modelOrders->status == 0){
			// перевіркa чи статус дорівнює 0. важливо
			// міняємо статус в таблиці ордерів
				$modelOrders->status = 1;
				$pas=$this->_generatepasword();
				$id_type_pasword=$modelOrders->id_type_pasword;
				$modelOrders->pasword = $pas;
				$user_id=$modelOrders->id_user;
				$modelOrders->save(false);
				/*$model = new Baza812UserBuyOrders();
				$model->findByPk($id_order);
				$user_id=$model->user_id;
				$id_type_pasword->$model->id_type_pasword;
				$model->status = 1;
				$pas=_generatepasword();
				$model->pasword = $pas;
				$model->save(false);*/
			// заповняємо таблицю доступів
				$modelUserAccess = new Baza812UserAccess();
				$modelUserAccess->user_id = $user_id;
				$modelUserAccess->pasword = $pas;
				$modelUserAccess->when_get_pasword = time();
				$modelUserAccess->type_pasword = $id_type_pasword;
				if ($id_type_pasword==8){
					$modelUserAccess->number_opened_phone_allowed = 25;
				}else{
					$modelUserAccess->number_opened_phone_allowed = 0;
				}
				$modelUserAccess->save(false);
				
				/// відправити смс

			}
			
		}
	}
	
	public function actionPay_callback_success() {
		
		$id_order = $_POST['PAYSTO_INVOICE_ID'];
		// ордер з бд і перевірити статус якщо 0 значить щось було не так і вивести повідомлення
		$modelOrders = Baza812UserBuyOrders::model()->findByPk($id_order);
		
		list($sms_id, $sms_cnt, $cost, $balance)=Yii::app()->smsc->send_sms('7'.$modelOrders->Baza812User->phone, "Ваш пароль: ".$modelOrders->pasword);
		list($status, $time) = Yii::app()->smsc->get_status($sms_id, '7'.$modelOrders->Baza812User->phone);
		
		if ($modelOrders->status == 1){
			//якщо 1 тоді все гуд
			$ok='ok';	
		}else{
			$ok='not_ok';
		}
		$this->render('view', array('ok'=>$ok, 'model'=>$modelOrders, 'smsstatus'=>$status));
 
	}
	
	public function actionPay_callback_fail() {
		$id_order = Yii::app()->session['order_id'];
		Yii::app()->session['order_id'] ='';
		$modelOrders = Baza812UserBuyOrders::model()->findByPk($id_order);
		$modelOrders->status=-1;
		$modelOrders->save(false);
		$this->render('view', array('ok'=>'abort', 'model'=>$modelOrders));
		// ставиш статус -1 і 
	}
	private function _generatepasword()
	{
		$pas=rand(10000, 99999);
		while (Baza812UserAccess::model()->find(array(
				'select'=>'pasword',
				'condition'=>'pasword=:pas',
				'params'=>array(':pas'=>$pas)
		)))
		{
			$pas=rand(10000, 99999);
		}
		return $pas;
	}
}
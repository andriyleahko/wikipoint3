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
				
			
			
			
			
			// Компонент переадресует пользователя в свой интерфейс оплаты
			Yii::app()->robokassa->pay(
					$price,
					$order_id,
					$description,
					'email'
			);
			
		}
	}
	
	
	public function actionResult() {
		
		
		
		$rc = Yii::app()->robokassa;
		
		
		$mrh_pass2 = $rc->sMerchantPass2;
		$out_summ = $_GET['OutSum'];
		$inv_id = $_GET['InvId'];
		$crc = strtolower($_GET["SignatureValue"]);
		$my_crc = strtolower(md5("$out_summ:$inv_id:$mrh_pass2"));
		
		
		if ($my_crc === $crc) {
			$InvId = Yii::app()->request->getParam('InvId');
			$modelOrders=Baza812UserBuyOrders::model()->findByPk($InvId);
			if ($modelOrders->status == 0){
				// перевіркa чи статус дорівнює 0. важливо
				// міняємо статус в таблиці ордерів
				$modelOrders->status = 1;
				$pas=$this->_generatepasword();
				$id_type_pasword=$modelOrders->id_type_pasword;
				$modelOrders->pasword = $pas;
				$user_id=$modelOrders->id_user;
				$modelOrders->save(false);
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
				list($sms_id, $sms_cnt, $cost, $balance)=Yii::app()->smsc->send_sms('7'.$modelOrders->Baza812User->phone, "Ваш пароль: ".$modelOrders->pasword);
				list($status, $time) = Yii::app()->smsc->get_status($sms_id, '7'.$modelOrders->Baza812User->phone);
			}
		
		} else {
			$InvId = Yii::app()->request->getParam('InvId');
			$modelOrders = Baza812UserBuyOrders::model()->findByPk($InvId);
			$modelOrders->status=-1;
			$modelOrders->save(false);
		}
		
	}
	
	public function actionSuccess() {
		$InvId = Yii::app()->request->getParam('InvId');
		$modelOrders=Baza812UserBuyOrders::model()->findByPk($InvId);
		if (isset($modelOrders)&&$modelOrders) {
			if ($modelOrders->status==1) {
				// Если робокасса уже сообщила ранее, что платеж успешно принят
				Yii::app()->user->setFlash('global',
						'Средства зачислены на ваш личный счет. Пароль будет в смс. Спасибо.');
			} else {
				// Если робокасса еще не отзвонилась
				Yii::app()->user->setFlash('global', 'Ваш платеж принят. Средства
                    будут зачислены на ваш личный счет в течение нескольких минут.
                     Пароль будет в смс. Спасибо.');
			}
		}
		//list($sms_id, $sms_cnt, $cost, $balance)=Yii::app()->smsc->send_sms('7'.$modelOrders->Baza812User->phone, "Ваш пароль: ".$modelOrders->pasword);
		//list($status, $time) = Yii::app()->smsc->get_status($sms_id, '7'.$modelOrders->Baza812User->phone);
		$this->render('view', array('ok'=>'ok', 'model'=>$modelOrders));
	}
	
		
	public function actionFailure() {
		Yii::app()->user->setFlash('global', 'Отказ от оплаты. Если вы столкнулись
            с трудностями при внесении средств на счет, свяжитесь
            с нашей технической поддержкой.');
	
		$this->render('view', array('ok'=>'not_ok', 'model'=>$modelOrders));
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
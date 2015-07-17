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

		$modelTypePasword = Baza812TypePasword::model ()->findAll ( array (
				'select' => '*',
				'condition' => 'price<>:price',
				'params' => array (':price' => 0) 
		) );
		if ($_POST) {
			
			
			$tarif = strip_tags ( $_POST ['tarif'] ); // id from table Baza812TypePasword
			$phone = strip_tags ( $_POST ['phone'] );
		
			if (! isset ( $phone ) || ! $phone) {
				$this->render ( 'index', array (
						'model' => $modelTypePasword,
						'not_phone' => 'введите телефон' 
				) );
				exit ();
			}
			
			$modelUser = Baza812User::model ()->with ( 'Baza812UserAccess' )->findAll ( array (
					'select' => '*',
					'condition' => 'phone=:phone',
					'params' => array (':phone' => $phone) 
			) );

			$test_for_tarif=False;
			foreach ($modelTypePasword as $mod){
				if ($mod->id==$tarif){
					$test_for_tarif=TRUE;
					$price=$mod->price;
				}
			}

			if (!$test_for_tarif){
				$this->render ( 'index', array (
						'model' => $modelTypePasword,
						'not_tarif' => 'выберите тариф',
				) );
				exit();
			}

			if (! $modelUser) { // New User
				// реєструвати юзера і вернути його ід
			} else {
				// тут ми просто маємо його ід
			}
			
			// тут ми маємо ід юзера і ід тип пароля (тариф)
			// це все пишемо в таблицю ордерів і статус 0 .... і дістаємо ід
			
			$data = array(
					'summ' => $price, // витягнеш з бази по тарифах
					'order_id' => 12, // id ордера
					'description' => 'Sraka chlen' // .....
			);
			
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
			
			// робиш перевірку чи статус дорівнює 0 то важливо
			// міняємо статус в таблиці ордерів
			
			// заповняємо таблицю доступів
		}
	}
	
	public function actionPay_callback_success() {
		
		$id_order = $_POST['PAYSTO_INVOICE_ID'];
		// витянеш ордер з бд і перевіриш статус якщо 0 значить щось було не так і виводиш повідомлення 
		//якщо 1 тоді виводиш все гуд 
	}
	
	public function actionPay_callback_fail() {
		$id_order = $_POST['PAYSTO_INVOICE_ID'];
		// ставиш статус -1 і 
	}
}
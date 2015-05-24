<?php
class SubscribeController extends Controller {
	public $layout = 'page';
	
//****************	перевірити
	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'CCaptchaAction',
						'backColor'=>0xFFFFFF,
				),
		);
	}
//******************
	public function actionIndex() {
		$model= new Baza812Subscribe;
		
		
		if (Yii::app ()->request->getPost ( 'subscribe' ) == 1) {
			// кімнати кваритри
			$rooms = array();
			if (Yii::app()->request->getPost('rooms-amount')){
				foreach (Yii::app()->request->getPost('rooms-amount') as $room)
					$rooms[] = $room;
			}
			$roomString = (count($rooms)) ? implode(',', $rooms) : null;
			$model->rooms_amount=$roomString;
			
			// імя підписника 
			if (Yii::app()->request->getPost('subscriber_name')){
				$model->subscriber_name = Yii::app()->request->getPost('subscriber_name');
			}
			
			// телефон підписника
			if (Yii::app()->request->getPost('subscriber_phone')){
				$model->subscriber_phone = Yii::app()->request->getPost('subscriber_phone');
			}
				
			// телефон підписника
			if (Yii::app()->request->getPost('subscriber_phone')){
				$model->subscriber_phone = Yii::app()->request->getPost('subscriber_phone');
			}
			
			// email підписника
			if (Yii::app()->request->getPost('subscriber_email')){
				$model->subscriber_email = Yii::app()->request->getPost('subscriber_email');
			}

			// variant
			if (Yii::app()->request->getPost('variant')){
				$model->variant = Yii::app()->request->getPost('variant');
			}
			
			// ціна до якої розсилати обєкти
			if (Yii::app()->request->getPost('price_max')){
				$model->price_max = (int)Yii::app()->request->getPost('price_max');
			}

			// перелік id типів metro
			$metroName='';
			if (Yii::app()->request->getPost('metro')){
				$metro=Yii::app()->request->getPost('metro');
				$metroName=Yii::app()->request->getPost('metro'); // треба, бо у виді у скритьому полі є назви, а не id
				$metroIDS = array();
				if (!empty($metro)) {
					$metro = "'" . implode("','",array_map('trim',explode(',',rtrim($metro,',')))) . "'";
					$metroCriteria = new CDbCriteria();
					$metroCriteria->addCondition('name in (' . $metro . ')');
					$modelMetro = ObjectsDovMetro::model()->findAll($metroCriteria);
					if ($modelMetro) {
						foreach ($modelMetro as $metro) {
							$metroIDS[] = $metro['id'];
						}
					}
				}else{
					$metroIDS[]='';
				}
				
				$model->metro = implode(',', $metroIDS);
			}
			
			// яка категорія людей житиме
			if (Yii::app()->request->getPost('people')){
				$model->people = Yii::app()->request->getPost('people');
			}
			
			//  наявність тварин
			if (Yii::app()->request->getPost('animals')){
				$model->animals = Yii::app()->request->getPost('animals');
			}
			
			//  наявність дытей до 7 років
			if (Yii::app()->request->getPost('kids')){
				$model->kids = Yii::app()->request->getPost('kids');
			}
			
			//  about_me
			if (Yii::app()->request->getPost('about_me')){
				$model->about_me = Yii::app()->request->getPost('about_me');
			}

		
			if ($model->validate()){
				echo 1111; exit; // уе писав для перевірки
				// $model->save();
				// redirect кудись.... наприклад на пошук
			};
		}
		$this->render ( 'index', array('model'=>$model, 'metroName'=>$metroName) );
	}
	
	// Uncomment the following methods and override them if needed
	/*
	 * public function filters()
	 * {
	 * // return the filter configuration for this controller, e.g.:
	 * return array(
	 * 'inlineFilterName',
	 * array(
	 * 'class'=>'path.to.FilterClass',
	 * 'propertyName'=>'propertyValue',
	 * ),
	 * );
	 * }
	 *
	 * public function actions()
	 * {
	 * // return external action classes, e.g.:
	 * return array(
	 * 'action1'=>'path.to.ActionClass',
	 * 'action2'=>array(
	 * 'class'=>'path.to.AnotherActionClass',
	 * 'propertyName'=>'propertyValue',
	 * ),
	 * );
	 * }
	 */
}
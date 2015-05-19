<?php

class ItemController extends Controller
{
	public $layout='item_page';
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function  actionShowItem($itemId)
	{
		$model=Objects::model()->with('ObjectsMetro','Owners')->findByPk($itemId);
		if ($model){
			$this->render('index', array('model'=>$model));
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
<?php

class ItemController extends Controller {

    public $layout = 'item_page';

    public function actionIndex() {
        $this->render('index');
    }

    public function actionShow($itemId) {
        $model = Objects::model()->with('ObjectsMetro', 'Owners')->findByPk($itemId);
        if ($model) {
            $this->render('index', array('model' => $model));
        }
    }

    public function actionGetCoordinate() {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, str_replace (" ", "+", "https://maps.googleapis.com/maps/api/geocode/json?address=" . Yii::app()->request->getQuery('address')));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $geoloc = curl_exec($ch);
        echo $geoloc;
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

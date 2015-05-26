<?php

class AddItemController extends Controller {

    public $layout = 'page';

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
                'testLimit' => 1,
            ),
        );
    }

    public function actionIndex() {
        exit('not found');
    }

    public function actionAdd() {
        
        $modelAddForm = new AddObjectForm();
        $metro = ObjectsDovMetro::model()->findAll();
        
        if (Yii::app()->request->getPost('add_object') == 1) {
            
            $dataPost = Yii::app()->request->getPost('AddObjectForm');

            $modelAddForm->setAttributes($dataPost);
            
            
            if ($modelAddForm->validate()) {
                
                // зареєструвати власника автоматично пароль на почту
                // записати всі поля для обєкту 
                // незабути про вибір квартира чи кімнати через умову
                // створювати оголошення неактивне і відправляти на модерацію
                // доробити ккординати в іншому контроллелі
                // карта на пошуку коли нема фото
                // 
                
            } 
        }
        $this->render('add_item', array('metro' => $metro, 'model' => $modelAddForm));
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

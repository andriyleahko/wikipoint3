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
        $street = ObjectsDovStreets::model()->findAll();
        $district = ObjectsDovDistrict::model()->findAll();

        if (Yii::app()->request->getPost('add_object') == 1) {
            
            $dataPost = Yii::app()->request->getPost('AddObjectForm');

            $modelAddForm->setAttributes($dataPost);
            
            $modelAddForm->validatePhotoes($_FILES['AddObjectForm']);
            
            $modelAddForm->validate(null,false);       
            
            if (!$modelAddForm->getErrors()) {
                
                $owner = new Owners();
                $owner->name = '';
                $owner->phone_1 = '';
                $owner->date_add = '';
                $owner->save(FALSE);
                
                $object = new Objects();
                $object->id_objectType = ''; // кількісь кімнат (ід тут звязок використовується) 
                $object->id_owner = $owner->id_owner;
                $object->price = '';
                $object->id_district = '';
                $object->id_street = '';
                $object->building_number = '';
                $object->status = 0; // статус показу на сайті
                $object->date_add = '';
                $object->id_currency = 2; // валюта
                $object->note = '';
                $object->save(FALSE);
                
                if ($modelAddForm->photo) {
                    foreach ($modelAddForm->photo as $photo) {
                        $picture = new Pictures();
                        $picture->id_object = $object->id_object;
                        /* @todo перевірити шляхи до грандпрайм */
                        $picture->file = $photo; 
                        $picture->save(FALSE);
                    }
                }
                
                
                $objectApartament = new ObjectsAppartment();
                $objectApartament->id_object = $object->id_object;
                $objectApartament->area_kitchen = ''; 
                $objectApartament->area_living = '';
                $objectApartament->area_total = '';
                $objectApartament->floor = ''; // поверх
                $objectApartament->floors = ''; // всього поверхів
                $objectApartament->save(FALSE);

                
                
                $objectMetro = new ObjectsMetro();
                $objectMetro->id_metro = '';
                $objectMetro->id_object = '';
                $objectMetro->id_tometro = '';
                $objectMetro->time_tometro = '';
                $objectMetro->save(FALSE);
                
                $moreInfo = new ObjectsMoreinfo();
                $moreInfo->fridge = '';
                $moreInfo->furniture = '';
                $moreInfo->internet = '';
                $moreInfo->washer = '';
                $moreInfo->tv = '';
                $moreInfo->save(FALSE);
                
            } 
        } 
        $this->render('add_item', array('metro' => $metro, 'model' => $modelAddForm, 'district' => $district, 'street' => $street));
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

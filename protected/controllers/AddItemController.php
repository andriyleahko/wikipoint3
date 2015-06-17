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

            $modelAddForm->validate(null, false);

            if (!$modelAddForm->getErrors()) {
                
                if (!$modelAddForm->phone_my) {
                    $modelAddForm->phone_my = $modelAddForm->phone;
                }

                $modelAddForm->uploadPhoto($_FILES['AddObjectForm']);

                $criteria = new CDbCriteria();
                $criteria->addCondition("phone = '" . $modelAddForm->phone_my . "'");
                $user = Baza812User::model()->find($criteria);
                if (!$user) {
                    $user = new Baza812User();
                    $user->name = '';
                    $user->phone = $modelAddForm->phone_my;
                    $user->email = $modelAddForm->email;
                    $user->about_me = $modelAddForm->about_me;
                    $user->save(false);
                }

                $owner = new Owners();
                $owner->name = $modelAddForm->user;
                $owner->phone_1 = $modelAddForm->phone;
                $owner->date_add = date("Y-m-d H:i:s", time());
                $owner->save(false);

                $object = new Objects();
                $object->id_objectType = ($modelAddForm->room_flat == 'room') ?
                        $modelAddForm->rooms : $modelAddForm->flat; // кількісь кімнат (ід тут звязок використовується) 
                $object->id_category = 1;
                $object->id_condition = 1;
                $object->id_contractType = 1;
                $object->id_typeRealty = 1;
                $object->id_owner = $owner->id_owner;
                $object->price = $modelAddForm->price;
                $object->source_url = 'Baza 812';
                $object->id_district = $modelAddForm->district;
                $object->id_street = $modelAddForm->street;
                $object->building_number = $modelAddForm->house_no;
                $object->status = 0; // статус показу на сайті
                $object->date_add = date("Y-m-d H:i:s", time());
                $object->id_currency = 2; // валюта
                $object->note = $modelAddForm->about_object;
                $object->who_add = $user->id;
                $object->is_new = 1;
                $object->save(false);

                if ($modelAddForm->photo) {
                    foreach ($modelAddForm->photo as $key => $photo) {
                        $picture = new Pictures();
                        $picture->id_object = $object->id_object;
                        $picture->file = $photo;
                        $picture->entity_pk = '-1';
                        $picture->num = $key;
                        $picture->save(false);
                    }
                }

                $objectApartament = new ObjectsAppartment();
                $objectApartament->id_object = $object->id_object;
                $objectApartament->area_kitchen = $modelAddForm->area_kitchen;
                $objectApartament->area_living = $modelAddForm->area_live;
                $objectApartament->area_total = $modelAddForm->area_full;
                $objectApartament->floor = $modelAddForm->floor; // поверх
                $objectApartament->floors = $modelAddForm->floor_max; // всього поверхів
                $objectApartament->save(false);

                $objectMetro = new ObjectsMetro();
                $objectMetro->id_metro = $modelAddForm->metro;
                $objectMetro->id_object = $object->id_object;
                $objectMetro->id_tometro = $modelAddForm->metro_to;
                $objectMetro->time_tometro = $modelAddForm->time_to_metro;
                $objectMetro->save(false);

                $moreInfo = new ObjectsMoreinfo();
                $moreInfo->fridge = (int) $modelAddForm->frige;
                $moreInfo->furniture = (int) $modelAddForm->furniture;
                $moreInfo->internet = (int) $modelAddForm->net;
                $moreInfo->washer = (int) $modelAddForm->washer;
                $moreInfo->id_object = $object->id_object;
                $moreInfo->save(false);
                
//                 var_dump($moreInfo->errors);
//                 var_dump($objectMetro->errors);
//                 var_dump($objectApartament->errors);
//                 var_dump($object->errors);
//                 var_dump($owner->errors);
//                 var_dump($user->errors);

                Yii::app()->user->setFlash('success', "Объект добавлен!!!!");
            }
        }
        $this->render('add_item', array('metro' => $metro, 'model' => $modelAddForm, 'district' => $district, 'street' => $street));
    }


}

<?php

class SubscribeController extends Controller {

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
        $model = new Baza812Subscribe;
        $metroName = '';

        if (Yii::app()->request->getPost('subscribe') == 1) {
            
            $dataPost = Yii::app()->request->getPost('Baza812Subscribe');
            //$modelExists = Baza812Subscribe::model()->findAll("subscriber_email = '" . $dataPost['subscriber_email'] . "' OR subscriber_phone = '" . $dataPost['subscriber_phone'] . "'");

            $model->setAttributes($dataPost);
            
            // кімнати кваритри
            $rooms = array();
            if ($roomsArr = $dataPost['rooms-amount']) {
                foreach ($roomsArr as $room)
                    $rooms[] = $room;
            }
            $roomString = (count($rooms)) ? implode(',', $rooms) : null;
            $model->rooms_amount = $roomString;
            
            if ($metroName = $dataPost['metro']) {

                $metroIDS = array();
                if (!empty($metroName)) {
                    $metro = "'" . implode("','", array_map('trim', explode(',', rtrim($metroName, ',')))) . "'";
                    $metroCriteria = new CDbCriteria();
                    $metroCriteria->addCondition('name in (' . $metro . ')');
                    $modelMetro = ObjectsDovMetro::model()->findAll($metroCriteria);
                    if ($modelMetro) {
                        foreach ($modelMetro as $metro) {
                            $metroIDS[] = $metro['id'];
                        }
                    }
                } else {
                    $metroIDS[] = '';
                }

                $model->metro = implode(',', $metroIDS);
            }
            
            

            if ( $model->save() ) {
                Yii::app()->user->setFlash('success', "Данные подписки сохранени!");
                
                // redirect кудись.... наприклад на пошук
            }
        }
        $this->render('index', array('model' => $model, 'metroName' => $metroName));
    }
    
    public function actionObjectForSending($subscriber_email)
    {
    	$model = Baza812Subscribe::model()->find('subscriber_email=:subscriber_email',array(':subscriber_email'=>$subscriber_email));
    	
    	$criteria = new CDbCriteria();
        $criteria->with = array('ObjectsMetro',
                               'Owners',
                               'ObjectsAppartment',
                               'ObjectsDovType',
                               'Pictures',
                               'ObjectsDovStreets',
                               'ObjectsMoreinfo'
                             	);
        $where='';
        if (isset($model->rooms_amount)&&$model->rooms_amount){
        	$where.='ObjectsDovType.id IN('.$model->rooms_amount.')';
        }
        if (isset($model->price_max)&&$model->price_max){
        	$where.=' AND price <= '.$model->price_max;
        }
        if (isset($model->metro)&&$model->metro){
        	$where.=' AND ObjectsMetro.id_metro IN('.$model->metro.')';
        }
        
        $criteria->addCondition($where);
        $count = Objects::model()->count($criteria);
        //**************************************************************************
        $criteria->limit = 10; //// може треба буде ліміт, які і скільки відправляти
        $criteria->offset = 10; //// може треба буде офсет, які і скільки відправляти
        //****************************************************************************
        $criteria->order='t.id_object DESC';
        
        $modelsend = Objects::model()->findAll($criteria);
		
        return $modelsend;
        
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

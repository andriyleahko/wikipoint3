<?php

class ItemController extends Controller {

    public $layout = 'item_page';

    public function actionIndex() {
        $this->render('index');
    }

    public function actionShow($itemId) {
        $model = Objects::model()->with('ObjectsMetro', 'Owners')->findByPk($itemId);
        $opened=FALSE;
        
        If(isset(Yii::app()->session['user_id'])&&Yii::app()->session['user_id']){
        	// if session exist, then find all users in Baza812UserAccess with current user_id 
        	$modelBaza812UserAccess=Baza812UserAccess::model()->findAll(array(
        			'select'=>'ids_object',
        			'condition'=>'user_id=:user_id',
        			'params'=>array(':user_id'=>Yii::app()->session['user_id'])
        	));
        	if ($modelBaza812UserAccess){
	        	foreach ($modelBaza812UserAccess as $mod){
	        		$ids=unserialize($mod->ids_object);
	        		if(in_array($itemId,$ids)){
	        			$opened=TRUE;
	        		}
	        	}
        	}
        }
        
        
        if ($model) {
            $this->render('index', array('model' => $model, 'opened'=>$opened));
        }
    }
	/**
	 * This method return latitude and longitude.
	 * @return array 
	 */
    public function actionGetCoordinate() {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, str_replace (" ", "+", "https://maps.googleapis.com/maps/api/geocode/json?address=" . Yii::app()->request->getQuery('address')));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $geoloc = curl_exec($ch);
        echo $geoloc;
    }
    
    public function actionShowphone($obectId=163,$pasword=1){
   	
    	$objModel=Objects::model()->findByPk($obectId);
    	if (isset($objModel)){
    		// object found
    		$phone=$objModel->Owners->phone_1;
    		$status='ok';
    	}else{
    		// object not found
    		$phone='+7 (XXX)XXX-XX-XX';	
    		$status='no';
    	}

    	$model=Baza812UserAccess::model()->find(array(
    							'select'=>'*',
    							'condition'=>'pasword=:pasword', 
    							'params'=>array(':pasword'=>$pasword)
    							));
    	
    	if (isset($model)&&$this->_checkAssess($model)){
    		//pasword found
    		If(!$ids=unserialize($model->ids_object)){
    			$ids=array();
    		}; 
    		if(!in_array($obectId,$ids)){ 
	    		$ids[]=$obectId;
	    		$model->ids_object=serialize($ids);
	    		$model->save();
    		}
    		echo json_encode(array('phone' => $phone, 'status'=>$status));
    		Yii::app()->session['user_id'] = $model->user_id;
    	}else{
    		// pasword not found or not allowed
    		$status='Этот пароль не подходит или закончился доступ';
    		echo json_encode(array('phone' => 'zz', 'status'=>$status));
    	}
    	exit();
    }
    
    private function _checkAssess($model){
    	switch ($model->type_pasword) {
    		case 1: // pasword was bought
    			if(time()-($model->when_get_pasword)<30*24*60*60){
    				return true;
    			}else{
    				return false;
    			}
    		default:
    			if(time()-($model->when_get_pasword)<6*30*24*60*60&&$model->number_opened_phone_allowed>0){
    				Baza812UserAccess::model()
    							->updateByPk($model->id, array(
    										'number_opened_phone_allowed'=>($model->number_opened_phone_allowed-1)
    							));
    				return true;
    			}else{
    				return false;
    			};
    		break;
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

<?php

class CatalogController extends Controller
{
        public $layout='page';
        private $limit = 25;
        
        
	public function actionIndex()
	{
		exit('not found');
	}
        
        public function actionSearch($b=1)
        {
            if (Yii::app()->request->getParam('search') == 1) {
                $criteria = new CDbCriteria();
                $criteria->with = array('ObjectsMetro',
                               'Owners',
                               'ObjectsAppartment',
                               'ObjectsDovType',
                               'Pictures',
                               'ObjectsDovStreets',
                               'ObjectsMoreinfo'
                              );
                $where = ' 1';
                $rooms = array();
                if (Yii::app()->request->getParam('rooms-amount')){
                    foreach (Yii::app()->request->getParam('rooms-amount') as $room)
                    $rooms[] = $room;
                }
                $roomString = (count($rooms)) ? implode(',', $rooms) : null;
                
                if ($roomString) {
                    $where .=' AND (id_objectType IN(' . $roomString . '))';
                }
                
                if ($priceFrom = Yii::app()->request->getParam('price_from')) {
                    $where .=' AND (price >= ' . $priceFrom . ')';
                }
                if ($priceTo = Yii::app()->request->getParam('price_to')) {
                    $where .=' AND (price <= ' . $priceTo . ')';
                }
                
                $metro = trim(Yii::app()->request->getParam('metro',''));
                
                if (!empty($metro)) {
                    $metro = "'" . implode("','",array_map('trim',explode(',',rtrim($metro,',')))) . "'";
                    $metroCriteria = new CDbCriteria();
                    $metroCriteria->addCondition('name in (' . $metro . ')');
                    $modelMetro = ObjectsDovMetro::model()->findAll($metroCriteria);
                    if ($modelMetro) {
                        $metroIDS = array();
                        foreach ($modelMetro as $metro) {
                            $metroIDS[] = $metro['id'];
                        }
                    }
                    
                    $where .= " AND (ObjectsMetro.id_metro in(" . implode(',',$metroIDS) . "))";  
                }
                
                
                $criteria->addCondition($where);
                $count = Objects::model()->count($criteria);
                $criteria->limit = $this->limit;
                $criteria->offset = Yii::app()->request->getParam('offset',0);
                $criteria->order='t.id_object DESC';
                
                $model = Objects::model()->findAll($criteria);
                
                
                $this->renderPartial('search-result',
                        array('objects' => $model,'total' => $count,'offset' => Yii::app()->request->getParam('offset',0), 'offsetNext' => Yii::app()->request->getParam('offset',0) + $this->limit)
                );
                Yii::app()->end();
            }
            $this->render('search');
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
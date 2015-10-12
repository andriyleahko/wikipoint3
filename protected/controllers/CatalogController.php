<?php

class CatalogController extends Controller
{
        public $layout='page';
        private $limit = 10;
        
        
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
                               'ObjectsMoreinfo',
                				'ObjectsDovDistrict'
                              );
                $where = ' t.status = 1 ';
                
                $where .= 'AND (t.source_url <> "miniwiki") ';
                
                switch (Yii::app()->request->getParam('days')) {
                	case 7:
                		$where .=' AND (t.date_add >= "' . date('Y-m-d',time()-7*24*60*60).' 00:00:01' . '")';
                		break;
                	case 3:
                		$where .=' AND (t.date_add >= "' . date('Y-m-d',time()-3*24*60*60).' 00:00:01' . '")';
                		break;
                	case 1:
                		$where .=' AND (t.date_add >= "' . date('Y-m-d',time()).' 00:00:01' . '")';
                		break;
                	case -1:
                		$dayFrom=Yii::app()->request->getParam('dayFrom');
                		$dayTo=Yii::app()->request->getParam('dayTo');
                		if(isset($dayFrom)&&$dayFrom){
                			$where .=' AND (t.date_add >= "' . $dayFrom.' 00:00:01' . '")';
                		}
                		if(isset($dayTo)&&$dayTo){
                			$where .=' AND (t.date_add <= "' . $dayTo.' 23:59:59' . '")';
                		}
                		break;
                	default:
                		$where .=' AND (t.date_add >= "' . date('Y-m-d H:i:s',time()-7*24*60*60) . '")';
                		break;
                }
                
                $rooms = array();
                if (Yii::app()->request->getParam('rooms-amount')){
                    foreach (Yii::app()->request->getParam('rooms-amount') as $room)
                    $rooms[] = $room;
                }
                $roomString = (count($rooms)) ? implode(',', $rooms) : null;
                
                if ($roomString) {
                    $where .=' AND (id_objectType IN(' . $roomString . '))';
                }
                
                if ($priceFrom = (int) Yii::app()->request->getParam('price_from')) {
                    $where .=' AND (price >= ' . $priceFrom . ')';
                }
                if ($priceTo = (int) Yii::app()->request->getParam('price_to')) {
                    $where .=' AND (price <= ' . $priceTo . ')';
                }
                
                $metro = str_replace('m_', '', trim(Yii::app()->request->getParam('metro','')));
                

                if (!empty($metro)) {
//                    $metro = "'" . implode("','",array_map('trim',explode(',',rtrim($metro,',')))) . "'";
//                     $metroCriteria = new CDbCriteria();
//                     $metroCriteria->addCondition('name in (' . $metro . ')');
//                     $modelMetro = ObjectsDovMetro::model()->findAll($metroCriteria);
//                     if ($modelMetro) {
//                         $metroIDS = array();
//                         foreach ($modelMetro as $metro) {
//                             $metroIDS[] = $metro['id'];
//                         }
//                     }
                    $where .= " AND (ObjectsMetro.id_metro in(" . rtrim($metro,',') . "))";  
                }
                //var_dump($where); exit;
                
                $distrist = str_replace('ch', '', trim(Yii::app()->request->getParam('dictrict','')));
                
                if (!empty($distrist)) {
                	$where .= " AND (ObjectsDovDistrict.id in(" . rtrim($distrist,',') . "))";
                }
				
                

                
                
                $criteria->addCondition($where);
                $count = Objects::model()->count($criteria);
                $criteria->limit = $this->limit;
                $criteria->offset = Yii::app()->request->getParam('offset',0);
                //$criteria->order='t.id_object DESC';
				$criteria->order='t.date_add DESC';
                
                $model = Objects::model()->findAll($criteria);
                
                $offsetNext = Yii::app()->request->getParam('offset',0) + $this->limit;
                $offsetPrev = Yii::app()->request->getParam('offset',0) - $this->limit;
                
                if (isset($_GET['offset'])) {
                    unset($_GET['offset']);
                }
                
                $url = Yii::app()->request->pathInfo . '?' . http_build_query($_GET);
                
                if ($count > $offsetNext) {
                    $nextUrl = $url . '&offset=' . $offsetNext;
                }
                
                if ($offsetPrev >= 0) {
                    $prevUrl = $url . '&offset=' . $offsetPrev;
                }
                
                
                $this->render('search-result',
                        array(	'par'=>$_GET,
                        		't'=>$offsetNext,
                        		'objects' => $model,
                        		'total' => $count,
                        		'offset' => Yii::app()->request->getParam('offset',0), 
                        		'offsetNext' => (isset($nextUrl)) ? $nextUrl : null, 
                        		'offsetPrev' => (isset($prevUrl)) ? $prevUrl : null)
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
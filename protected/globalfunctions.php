<?php
/**
 * Функция склонения числительных в русском языке
 *
 * @param int      $number  Число которое нужно просклонять
 * @param array  $titles      Массив слов для склонения
 * @return string
 **/
function declOfNum($number, $titles) {
	$cases = array (
			2,
			0,
			1,
			1,
			1,
			2 
	);
	return $number . " " . $titles [($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases [min ( $number % 10, 5 )]];
}

// echo declOfNum(108, array('день', 'дня', 'дней'));

/**
 * 
 * @param string $dateTime
 * @return bolean
 */
function show_number_if_old($dateTime) {
	$vas = strtotime ( $dateTime );
	$date1 = new DateTime ( "now" ); // problem with winter and summer time zone in Russia. Russia do not change time on "summer time"
	$date2 = new DateTime ( "@" . $vas );
	$interval = $date2->diff ( $date1 );
	
	$year = $interval->format ( "%y" );
	$month = $interval->format ( "%m" );
	$day = $interval->format ( "%d" );
	$hour = $interval->format ( "%h" );
	$min = $interval->format ( "%i" );
	$sec = $interval->format ( "%s" );
	
	if((int)$day > 7){
		return true;
		exit;
	}
	if((int)$month>0){
		return true;
		exit;
	}
	if((int)$year>0){
		return true;
		exit;
	}
	return false;	
}


function dateTimeAgo($dateTime) { // define days, month, days and time from date to today
	$vas = strtotime ( $dateTime );
	
	$date1 = new DateTime ( "now" ); // problem with winter and summer time zone in Russia. Russia do not change time on "summer time"
	$date2 = new DateTime ( "@" . $vas );
	$interval = $date2->diff ( $date1 );
	
	$year = $interval->format ( "%y" );
	$month = $interval->format ( "%m" );
	$day = $interval->format ( "%d" );
	$hour = $interval->format ( "%h" );
	$min = $interval->format ( "%i" );
	$sec = $interval->format ( "%s" );
	
	if ($year != 0) {
		return $year . ' год. назад';
		exit ();
	}
	if ($month != 0) {
		return $month . ' мес. назад';
		exit ();
	}
	if ($day != 0) {
		return declOfNum ( $day, array (
				' день',
				' дня',
				' дней' 
		) ) . ' назад';
		exit ();
	}
	if ($hour != 0) {
		return $hour . ' ч. назад';
		exit ();
	}
	if ($min != 0) {
		return $min . ' мин. назад';
		exit ();
	}
	return $sec . ' cек. назад';
}
// echo dateTimeAgo('15-09-2015 14:00:22');
// echo '<br>';
// echo dateTimeAgo('15-09-2015 13:53:53');

/**
 *
 * @param string $addresss
 *        	адрес объекта
 * @return assoc array('lat','lng') масив широта и долгота
 */
function get_object_location($addresss) {
	$ch = curl_init ();
	curl_setopt ( $ch, CURLOPT_URL, str_replace ( " ", "+", "https://maps.googleapis.com/maps/api/geocode/json?address=" . $addresss ) );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	$geoloc = curl_exec ( $ch );
	$ar = json_decode ( $geoloc, true );
	return $ar ['results'] [0] ['geometry'] ['location'];
}

/**
 *
 * @param int $id
 *        	метро id
 * @return array('lat','lng')
 */
function get_merto_location($id) {
	// временно
	$dsn = 'mysql:host=localhost;dbname=merapoisk';
	$username = 'root';
	$password = '';
	$connection = new CDbConnection ( $dsn, $username, $password );
	$connection->charset = 'utf8';
	$connection->active = true;
	// временно
	
	
	//$connection = Yii::app()->db;
	$sql = "SELECT latitude,longitude from objects_dov_metro where id = " . $id;
	$command = $connection->createCommand ( $sql );
	$loc = $command->queryRow ();
	return $loc;
}

/**
 *
 * @param array $loc1('lat','lng'),        	
 * @param int $id        	
 * @return string $dist
 */
function calc_distanse($loc1, $id) {
	
	$loc2 = get_merto_location ( $id );
	
	$lat1 = deg2rad ( $loc1 ['lat'] );
	$lng1 = deg2rad ( $loc1 ['lng'] );
	
	$lat2 = deg2rad ( $loc2 ['latitude'] );
	$lng2 = deg2rad ( $loc2 ['longitude'] );
	
	// Haversine formula (формула сферической геометрии)
	$R = 6371000; // metres радиус Земли 
	$delta_phi = $lat2 - $lat1;
	$delta_lambda= $lng2 - $lng1;
	
	$a = sqrt(sin($delta_phi/2)*sin($delta_phi/2) + cos($lat1)*cos($lat2)*sin($delta_lambda/2)*sin($delta_lambda/2));
	
	$dist = 2*$R*asin($a);
	return $dist;
	
}
/**
 * 
 * @param string $address
 * @return assoc array('id'=>'value')
 */

function get_all_distanse($address) {
	$ar_dis=array();
	$loc1 = get_object_location ( 'Санкт-Петербург ' . $address );
	for ($id = 4; $id <= 68; $id++) {
		$ar_dis[$id]=calc_distanse($loc1, $id);
	}
	return $ar_dis; 
}

/*
echo '<pre>';
var_dump(get_all_distanse('Гражданский Пр., 21 к2')); exit;

exit ();
*/

// Select query
// return array
function fetchRows($query,$allResults=true){
	if(!$query) return null;
	$aq = array();
	$connection = Yii::app()->db;
	$aq = $connection->createCommand($query)->queryAll();
	if($allResults && $aq){
		return $aq;
	}else{
		$ar = array();
		if($aq){
			foreach($aq as $v){
				foreach($v as $val){
					$ar[] = $val;
				}
			}
		}// else return empty Array
		return $ar;
	}
}

function aGetComplainTypes($key = 0, $reverse = false){
	$aComplainType = array(
			1=>'Недействителен номер телефона',
			'Продан',
			'Ошибка в описании',
			'Перенести в архив',
			'Не хочу его видеть',
			'Иное',
			// from other logic (near complaint button)
			'Сдано',
			'Агент'
	);
	if($reverse){
		$aComplainType2 = array_flip($aComplainType);
		if($key){
			if(!isset($aComplainType2[$key])) return 0;
			return $aComplainType2[$key];
		}
	} else {
		if($key){
			if(!isset($aComplainType[$key])) return 0;
			return $aComplainType[$key];
		} else {
			return $aComplainType;
		}
	}
}
<?php
function dateTimeAgo($dateTime) { //define days, month, days and time from date to today 
	list($date, $time) = explode(' ', $dateTime);
	list($year,$month,$day)=explode('-', $date);
	list($hour,$min,$sec)=explode(':',$time);
	if($hour!=='00'||$hour!=='10'||$hour!=='20'){$hour=str_replace('0', '', $hour);}
	if($month!=='10'){$month=str_replace('0', '', $month);}
	if($day!=='10'||$day!=='20'||$day!=='30'){$day=str_replace('0', '', $day);}
	
	$ye=-(int)$year+(int)date("Y");
	if($ye>0){
		echo $ye. ' год. назад';
	}else{
		$mon=-(int)$month+(int)date("n");
		if($mon>0){
			echo $mon. ' мес. назад';
		}else{
			$da=-(int)$day+(int)date("j");
			if($da>0){
				echo $da. ' дней назад';
			}else{
				$ho=-(int)$hour+(int)date("G");
				if($ho>0){
					echo $ho. ' ч. назад';
				}
			}
		}
	}
}
<?php
function dateTimeAgo($dateTime) { //define days, month, days and time from date to today 
	list($date, $time) = explode(' ', $dateTime);
	list($year,$month,$day)=explode('-', $date);
	list($hour,$min,$sec)=explode(':',$time);
	if(($hour=='10')||($hour=='20')){}else{$hour=str_replace('0', '', $hour);};
	if(($min=='10')||($min=='20')||($min=='30')||($min=='40')||($min=='50')){}else{$min=str_replace('0', '', $min);};
	if(($month=='10')){}else{$month=str_replace('0', '', $month);};
	if(($day=='10')||($day=='20')||($day=='30')){}else{$day=str_replace('0', '', $day);};
	
	
	
	$ye=-(int)$year+(int)date("Y");
	if($ye>0){
		return $ye. ' год. назад  ';
	}else{
		$mon=-(int)$month+(int)date("n");
		if($mon>0){
			return $mon. ' мес. назад ';
		}else{
			$da=-(int)$day+(int)date("j");
			if($da>0){
				return $da. ' дн. назад ';
			}else{
				$ho=-(int)$hour+(int)date("G");
				if($ho>0){
					return $ho. ' ч. назад ';
				}else{
					$dd=getdate();
					$mi=-(int)$min+$dd['minutes'];
					if($mi>0){
						return $mi. ' мин. назад ';
					}
				}
			}
		}
	}
	
}	
	
	
	
	

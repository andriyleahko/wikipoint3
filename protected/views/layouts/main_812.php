<?php
$comnata=''; $k1='';  $k2='';  $k3='';  $k_more='';
if(isset($_GET)){
	if(isset($_GET['price_from'])&&$_GET['price_from']){
		$price_from=strip_tags($_GET['price_from']);
	}else{
		$price_from='';
	}
	if(isset($_GET['price_to'])&&$_GET['price_to']){
		$price_to=strip_tags($_GET['price_to']);
	}else{
		$price_to='';
	}
	if(isset($_GET['rooms-amount'])&&$_GET['rooms-amount']){
		$rooms_amount=$_GET['rooms-amount'];
		foreach ($rooms_amount as $one){
			if('7,8,9,10,11,12,13,14,15'===$one){
				$comnata='checked="checked"';
			}
			if('1'===$one){
				$k1='checked="checked"';
			}
			if('2'===$one){
				$k2='checked="checked"';
			}
			if('3'===$one){
				$k3='checked="checked"';
			}
			if('4,5,6'===$one){
				$k_more='checked="checked"';
			}
		}
	}else{
		$roomsamount=array();
	}
	if(isset($_GET['days'])){
		$days=strip_tags($_GET['days']);
	}else{
		$days=7;
	}
	if(isset($_GET['dayFrom'])){
		$dayFrom=strip_tags($_GET['dayFrom']);
	}else{
		$dayFrom=date('Y-m-d',time()-7*24*60*60);
	}
	if(isset($_GET['dayTo'])){
		$dayTo=strip_tags($_GET['dayTo']);
	}else{
		$dayTo=date('Y-m-d',time());
	}
	//var_dump($_GET['days']); exit;
} 
$aArea = array(1=>"Адмиралтейский",2=>"Василеостровский",3=>'Всеволожский',4=>"Выборгский",5=>"Калининский",6=>"Кировский",
7=>"Колпинский",8=>"Красногвардейский",9=>"Красносельский",10=>"Кронштадтский",11=>"Курортный",12=>"Московский",
13=>"Невский",14=>"Павловский",15=>"Петроградский",16=>"Петродворцовый",17=>"Приморский",18=>"Пушкинский",
19=>"Фрунзенский",20=>"Центральный",);
?>
<html>
    <head>
<!-- <link href="/img/logo.png" rel="shortcut icon"> -->
        <meta charset="utf-8">
        <style>
            @import url(/css/style.css);
            @import url(/css/catalog.css);
            @import url(/css/search.css);

            #main-menu {overflow: hidden; margin-bottom: 30px;}
            #main-menu .logo {width: 200px; height: 60px; display: block; float: left; margin-right: 20px; background: url(/img/logo.png) no-repeat center center; background-size: 200px;}
            #main-menu .menu-option {font: 600 22px/60px "Fira Sans"; text-decoration: none; color: white; margin-right: 20px;}
            
        </style>

        
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.js"></script>
        
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false&language=ru"></script>
        <!-- <script type="text/javascript" -->
        <!--       src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDLPXMgcCP2NtQaJqvz0EwP6LxR4vsb1sY&sensor=TRUE&language=ru"> -->
        <!-- </script> -->

       
        <script type="text/javascript" src="/js/jquery.cycle.all.min.js"></script>
        <script type="text/javascript" src="/js/jquery.easing.1.1.1.js"></script>
        
        <script type="text/javascript" src="/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.js"></script>
        <link rel="stylesheet" type="text/css" href="/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" />
        <link rel="stylesheet" type="text/css" href="/css/filter_main.css" />
        <script type="text/javascript" src="/js/jquery.fancybox-1.3.4/fancybox/jquery.easing-1.3.pack.js"></script>
        <script src="/js/jquery.cookie.js" ></script>
        
       
        <script  type="text/javascript" src="/js/baza812.js"></script>

<link rel="stylesheet"	href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link href='https://code.cdn.mozilla.net/fonts/fira.css' rel='stylesheet' type='text/css' />

<script "text/javascript">
$(document).ready(function(){
	$.datepicker.regional['ru'] = {
			closeText: 'Закрыть',
			prevText: '&#x3c;Пред',
			nextText: 'След&#x3e;',
			currentText: 'Сегодня',
			monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
			'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
			monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
			'Июл','Авг','Сен','Окт','Ноя','Дек'],
			dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
			dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
			dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
			dateFormat: 'dd.mm.yy',
			firstDay: 1,
			isRTL: false
			};
	$(function() {
		$.datepicker.setDefaults($.datepicker.regional['ru']);
		$(".datepicker").datepicker({
			dateFormat: 'yy-mm-dd',

			});
	});

	
  });
</script>
<style>
        .ui-widget {
  font-size:10px;
}        
#ui-datepicker-div {
	font-size: 16px;
}
        </style>

        <title>Аренда квартир и комнат</title>
    </head>
    <body>
        <div class="wrapper">

            <div id="main-menu">
                <a class="logo" href="/"></a>
                <a class="menu-option" href="/howitworks/">Принцип работы</a>
                <a class="menu-option" href="/getpassword">Документы</a>
                <a class="menu-option" href="/byAccess">Оплата</a>
                <a class="add-item" href="/add-item">Сообщить о квартире</a>
            </div>
<div id="main-search">
    <p>Я ищу</p>
    <form method="get" action="/catalog/search" id="search-form">
        <fieldset class="room">
            <input type="checkbox" name="rooms-amount[]" value="7,8,9,10,11,12,13,14,15" id="r441" <?php echo $comnata;?>>
            <label for="r441"><span>комнату</span></label>
        </fieldset>

<!--         <p >квартиру</p> -->

        <fieldset class="rooms">
            <input type="checkbox" value="1" name="rooms-amount[]" id="r1" <?php echo $k1;?>>
            <label for="r1"><span>1 ККВ</span></label>

            <input type="checkbox" value="2" name="rooms-amount[]" id="r2" <?php echo $k2;?>>
            <label for="r2"><span>2 ККВ</span></label>

            <input type="checkbox" value="3" name="rooms-amount[]"  id="r3" <?php echo $k3;?>>
            <label for="r3"><span>3 ККВ</span></label>

            <input type="checkbox" value="4,5,6" name="rooms-amount[]" id="r4" <?php echo $k_more;?>>
            <label for="r4" style='width:133px;'><span>4 ККВ и более</span></label>
            <?php /*<p style="color: #9B9B9B;">без агентов,</p>
            <p>без агентов,</p>
            */ ?>
        </fieldset>

        <p>рядом с метро</p>
        <input type="hidden" id="metro-field" name="metro" value="">
        <input type="hidden" id="dictrict-field" name="dictrict" value="">
        <input type="hidden" name="search" value="1">
        <a class="choose-metro" href="#">Выбрать станции</a>
        
        <p style='margin-left:18px;'>По цене от </p>
		<input style='margin-left:-10px;' class='priceinput' type='text' name=price_from size="8px;" pattern="^[ 0-9]+$" maxlength="10" value="<?php echo $price_from;?>">
<!--         <select name="price_from"> -->
<!--             <option value="45000">45.000 руб.</option> -->
<!--             <option value="50000">50.000 руб.</option> -->
<!--         </select> -->

        <p style='margin-left:-21px;'>до</p>

        <input style='margin-left:-11px;' class='priceinput' type='text' name=price_to size="8px;" pattern="^[ 0-9]+$" maxlength="10" value="<?php echo $price_to;?>">
<!--         <select name="price_to"> -->
<!--             <option value="0" selected="selected">любой</option> -->
<!--         </select> -->

        
        <br/>
        <br/>
			<div class="checkboxes-wrapper">
                <div id='d-7' class="radioss <?php echo($days=='7')?'acti':'';?>">
                    <span></span>
                    <input type="radio" value="7" name="days" <?php echo($days=='7')?'checked':"";?>><label>за 7 дней</label>
                </div>
                <div id='d-3' class="radioss <?php echo($days=='3')?'acti':'';?>">
                    <span></span>
                    <input type="radio" value="3" name="days" <?php echo($days=='3')?'checked':"";?>><label>за 3 дня</label>
                </div>
				<div id='d-0' class="radioss <?php echo($days=='1')?'acti':'';?>">
                    <span></span>
                    <input type="radio" value="1" name="days" <?php echo($days=='1')?'checked':"";?>><label>за сегодня</label>
                </div>
               	<div id='d-f-t' class="radioss <?php echo($days=='-1')?'acti':'';?>">
                    <span style='margin-left:42px;'></span>
                    <input type="radio" value="-1" <?php echo($days=='-1')?'checked':"";?> name="days">
                    <label style='margin-left:33px;'>с</label>
                    <input	id='dayFrom' maxlength="19" name='dayFrom' value="<?php echo $dayFrom?>" style='display: block;  margin-left: 90px; width: 140px;' class='datepicker'>
                    <label style='margin-left:146px;'>по</label>
                    <input	id='dayTo' maxlength="19" name='dayTo' value="<?php echo $dayTo?>" style='display: block;  margin-left: 260px; width: 140px;' class='datepicker'>
                </div>	
			
            </div>
            <input type="submit" id="--search-submit" value="Поиск">
            
     
        
    </form>

		</div>
            <?php echo $content; ?>

        
        <div id='paysto_verification-form'>
			<!-- begin paysto verification --> 
			<a style='text-decoration: none; color: #5e5e5e; font-size:14px;' href="http://paysto.ru/fromshop=22523" target="_blank">Совместно с PAYSTO</a> 
			<!-- end paysto verification -->
			<br>
			<a target="_blank" href="http://www.megastock.ru/">
				<img border="0" alt="www.megastock.ru" src="/img/acc_blue_on_transp_ru.png">
			</a>
			<img border="0" src="/img/mastercard8831_s1.png">
			<img border="0" src="/img/visa8831_s1.png">
			<a target="_blank" href="http://www.money.yandex.ru">
				<img border="0" src="/img/yandex8831_s1.png">
			</a>
		</div>
		<div style="float:right; margin-top: -55px; line-height: 20px; width: 235px; text-align: right; color: #5e5e5e">
			<b style="font-size:13px;">
				<a style="font-size:14px; text-decoration: none; color: #5e5e5e" href="/contact">Если у вас возникли сложности — обратитесь в службу поддержки:</a>
				<br>
				+7 (965) 035-63-02, 6425123@gmail.com
			</b>
		</div>
        </div>

        
        <div class="reveal-modal" id="metro" style="heigth: 100%;">
<?php /*?>
            <span class="close-reveal-modal"></span>

            <ul id="mapspb" style="margin-top: 50px; float: left">

                <li class="nsel" id="Komendantskiy"><a class="Komendantskiy" title="Комендантский проспект" href="#"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Starder"><a class="Starder" title="Старая деревня" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Krestovskiy"><a class="Krestovskiy" title="Крестовский Остров" href="#" ><span>&nbsp;</span></a></li>
                <li class="nsel" id="Chkalovskaya"><a class="Chkalovskaya" title="Чкаловская" href="#" ><span>&nbsp;</span></a></li>
                <li class="nsel" id="Sport"><a class="Sport" title="Спортивная" href="#"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Parnas"><a class="Parnas" title="Парнас" href="#" ><span>&nbsp;</span></a></li>
                <li class="nsel" id="Prosvesz"><a class="Prosvesz" title="Проспект Просвещения" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Ozerki"><a class="Ozerki" title="Озерки" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Ydalnaya"><a class="Ydalnaya" title="Удельная" href="#"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Pionerskaya"><a class="Pionerskaya" title="Пионерская" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Chornayareka"><a class="Chornayareka" title="Черная речка" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Petrohradskaya"><a class="Petrohradskaya" title="Петроградская" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Horkovskaya"><a class="Horkovskaya" title="Горьковская" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Nevskiy"><a class="Nevskiy" href="#" title="Невский проспект"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Hostinnui"><a class="Hostinnui" href="#" title="Гостиный двор"><span>&nbsp;</span></a></li>



                <li class="nsel" id="Franzenskaya"><a class="Franzenskaya" title="Фрунзенская" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Borovaya"><a class="Borovaya" title="Боровая" href="#"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Moskovskievorota"><a class="Moskovskievorota" href="#" title="Московские ворота"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Zavstavskaya"><a class="Zavstavskaya" href="#" title="Заставская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Bronevaya"><a class="Bronevaya" href="#" title="Броневая"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Elektrosila"><a class="Elektrosila" href="#" title="Электросила"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Parkpobedu"><a class="Parkpobedu" href="#" title="Парк Победы"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Moskovskaya"><a class="Moskovskaya" href="#" title="Московская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Zvezdnaya"><a class="Zvezdnaya" href="#" title="Звездная"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Kypchino"><a class="Kypchino" href="#" title="Купчино"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Deviatkino"><a class="Deviatkino" href="#" title="Девяткино"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Hrazsdan"><a class="Hrazsdan" href="#" title="Гражданский проспект"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Akadem"><a class="Akadem" href="#" title="Академическая"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Politeh"><a class="Politeh" href="#" title="Политехническая"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Myzh"><a class="Myzh" href="#" title="Площадь мужества"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Lesnaya"><a class="Lesnaya" href="#" title="Лесная"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Vuborh"><a class="Vuborh" href="#" title="Выборгская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Lenina"><a class="Lenina" href="#" title="Площадь Ленина"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Black"><a class="Black" href="#" title="Чернышевская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Vostaniya"><a class="Vostaniya" href="#" title="Площадь Восстания"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Mayakovska"><a class="Mayakovska" href="#" title="Мяковская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Obvodnui"><a class="Obvodnui" href="#" title="Обводный канал"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Obvodnui2"><a class="Obvodnui2" href="#" title="Обводный канал"><span>&nbsp;</span></a></li>			
                <li class="nsel" id="Volkovska"><a class="Volkovska" href="#" title="Волковская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Byharestska"><a class="Byharestska" href="#" title="Бухарестская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Mezhdynarod"><a class="Mezhdynarod" href="#" title="Международная"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Prospslavu"><a class="Prospslavu" href="#" title="Проспект Славы"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Dynaiska"><a class="Dynaiska" href="#" title="Дунайская"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Shyshru"><a class="Shyshru" href="#" title="Шушары"><span>&nbsp;</span></a></li>

                <li class="nsel" id="Lomonosov"><a class="Lomonosov" href="#" title="Ломоносовская"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Proletar"><a class="Proletar" href="#" title="Пролетарская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Obyhovo"><a class="Obyhovo" href="#" title="Обухово"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Ribackoe"><a class="Ribackoe" href="#" title="Рыбацкое"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Newcherkas"><a class="Newcherkas" href="#" title="Новочеркаская"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Ladozhska"><a class="Ladozhska" href="#" title="Ладожская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Prbolshevik"><a class="Prbolshevik" href="#" title="Проспект Большевиков"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Dubenko"><a class="Dubenko" href="#" title="Улица Дыбенко"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Nevskii1"><a class="Nevskii1" href="#" title="Площадь Александра Невского"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Nevskii2"><a class="Nevskii2" href="#" title="Площадь Александра Невского"><span>&nbsp;</span></a></li>

                <li class="nsel" id="Pyshkinska"><a class="Pyshkinska" href="#" title="Пушкинская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Zvinigorodska"><a class="Zvinigorodska" href="#" title="Звенигорадская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Vasileostrovska"><a class="Vasileostrovska" href="#" title="Василеостровская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Primorska"><a class="Primorska" href="#" title="Приморская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Admiralterska"><a class="Admiralterska" href="#" title="Адмиралтейская"><span>&nbsp;</span></a></li>	
                <li class="nsel" id="Senna"><a class="Senna" href="#" title="Сенная площадь"><span>&nbsp;</span></a></li>	
                <li class="nsel" id="Spaskaya"><a class="Spaskaya" href="#" title="Спасская"><span>&nbsp;</span></a></li>					
                <li class="nsel" id="Sadova"><a class="Sadova" href="#" title="Садовая"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Teatralna"><a class="Teatralna" href="#" title="Театральная"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Tehnology1"><a class="Tehnology1" href="#" title="Технологический институт"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Tehnology2"><a class="Tehnology2" href="#" title="Технологический институт"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Baltiska"><a class="Baltiska" href="#" title="Балтийская"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Narvska"><a class="Narvska" href="#" title="Нарвская"><span>&nbsp;</span></a></li>	
                <li class="nsel" id="Kirovsky"><a class="Kirovsky" href="#" title="Кировский завод"><span>&nbsp;</span></a></li>

                <li class="nsel" id="Putilovskaya"><a class="Putilovskaya" href="#" title="Путиловская"><span>&nbsp;</span></a></li>

                <li class="nsel" id="Ugozapadnaya"><a class="Ugozapadnaya" href="#" title="Юго-Западная"><span>&nbsp;</span></a></li>						
                <li class="nsel" id="Avtovo"><a class="Avtovo" href="#" title="Автово"><span>&nbsp;</span></a></li>
                <li class="nsel" id="Leninsky"><a class="Leninsky" href="#" title="Ленинский проспект"><span>&nbsp;</span></a></li>	
                <li class="nsel" id="Veteranov"><a class="Veteranov" href="#" title="Проспект Ветеранов"><span>&nbsp;</span></a></li>					
            </ul>
            <div style="float: left; margin-left: 35px; margin-top: 25px;">
                <h4>Выбранные станции</h4>
                <div id="select-metro" style="padding-left: 10px; padding-right: 10px;  font-size: 14px; height: 500px; overflow-y: auto">

                </div>
                <div>
                    <button onclick="$('#metro').hide();
                        			
                            return false;" style="background: #4579A6;border: none; border-radius: 4px; color: white;  height: 44px;  font: 18px/30px 'PT Sans';  padding: 0px 20px 0px 20px;  margin-top: 8px;">
                        Выбрать
                    </button>
                    <button onclick="
                            $('.selected-metroes').remove();
                            $('#metro').hide();
                            if ($('.selected-metroes').length > 0) {
                                $('.choose-metro').text('Выбрано ' + $('.selected-metroes').length + ' станций')
                            } else {
                                $('.choose-metro').text('Выбрать станции')
                            }
                            return false;
                            " 
                            style="
                            background: #DEDEDE;
                            border: none; 
                            border-radius: 4px; 
                            color: white; 
                            height: 44px; 
                            font: 18px/30px 'PT Sans'; 
                            padding: 0px 20px 0px 20px;  
                            margin-top: 8px;
                            ">
                        Очистить
                    </button>
                </div>

            </div>
            <div style="clear:both"></div>
            <div class="rightrez2">
                <div class="inside">
                    <div class="stations">

                        <div class="clr"></div>
                    </div>

                    <div class="clr"></div>
                </div>
            </div>
<?php */?>



            
	<div class="p-regions" style="display: block; z-index: 20000; top: 41px; left: -473px; box-shadow: 0 1px 30px 0 rgba(0, 0, 0, 0.5);height: 506px;">
	    <span class="close"></span>
<!--     	<span class="ttl ttl_t1">Выберите район:</span> -->
<!--     	<span class="ttl ttl_t2">Выберите станции метро:</span> -->
    	<div class="clr"></div>
		<div class="metro-map">
		    <?php // New Metro Map (4-68)
		    for( $i=4; $i<=68; $i++){ ?>
		    	<?php
		    		$act='';
		    		if(isset($_GET)){
		    			if(isset($_GET['metro'])&&$_GET['metro']){
		    				$metroIDS=explode(',',rtrim(strip_tags($_GET['metro']),','));
		    			}else{
		    				$metroIDS=array();
		    			}	
		    		}
		    		if(in_array('m_'.$i,$metroIDS)){
		    			$act='active';
		    		}
		    	?>
		        <a href="javascript:void(0)" id="m_<?=$i?>" class="st-name <?php echo $act;?>" onclick="selMetro(this,<?=$i?>)"></a>
		    <?php }
				$num=count($metroIDS);
		    ?>
		</div>
		<script type="text/javascript">		
			if (<?php echo $num?> > 0) {
            	$('.choose-metro').text('Выбрано ' + '<?php echo $num?>' + ' станций')
        	} else {
            	$('.choose-metro').text('Выбрать станции')

        	}
		</script>
		<?php //////////////////////////////// Районы ////////////////////////////////?>
        <div class="col col_popup">
				<?php
				$i=1;
				foreach($aArea as $k=>$name){?>
				<?php
		    		$act='';
		    		$style='left top';
		    		if(isset($_GET)){
		    			if(isset($_GET['dictrict'])&&$_GET['dictrict']){
		    				$dictrictIDS=explode(',',rtrim(strip_tags($_GET['dictrict']),','));
		    			}else{
		    				$dictrictIDS=array();
		    			}	
		    		}
		    		if(in_array('ch'.$i,$dictrictIDS)){
		    			$act='act';
		    			$style='left bottom';
		    		}
		    		$i++;
		    	?>
    			<label class="checkbox_in">
        		<input class="dis <?php echo $act?>" type="checkbox" name="district_<?=$k?>" id="ch<?=$k?>" onclick="selDistrict(this,<?=$k?>);">
        		<span id="sp<?=$k?>" style="background-position: <?php echo $style?>;"></span>
        		<?=$name?>
    			</label>
		<?php } ?>
        </div>
            
            <input type="hidden" name="str_metros" value="" id="str_metros"/>
            <input type="hidden" name="str_districts" value="" id="str_districts"/>
			<div class="subm-btns">
	            <input type="reset" value="Сбросить" class="reset" onclick="resMetro(this);selMetro('undefined');"/>
	            <input type="button" value="Выбрать" class="send"/>
            <div class="clr"></div>
        </div>
	</div>
        

		
		</div>
		

        
    </body>

</html>
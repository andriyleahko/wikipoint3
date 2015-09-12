<?php
$aArea = array(1=>"Адмиралтейский",2=>"Василеостровский",3=>'Всеволожский',4=>"Выборгский",5=>"Калининский",6=>"Кировский",
		7=>"Колпинский",8=>"Красногвардейский",9=>"Красносельский",10=>"Кронштадтский",11=>"Курортный",12=>"Московский",
		13=>"Невский",14=>"Павловский",15=>"Петроградский",16=>"Петродворцовый",17=>"Приморский",18=>"Пушкинский",
		19=>"Фрунзенский",20=>"Центральный",);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="http://vk.com/js/api/share.js?91" charset="utf-8"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false&language=ru"></script>
<!-- <script type="text/javascript" -->
<!--       src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDLPXMgcCP2NtQaJqvz0EwP6LxR4vsb1sY&sensor=TRUE&language=ru"> -->
<!-- </script> -->
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.js"></script>
<script type="text/javascript" src="/js/jquery.cycle.all.min.js"></script>

<!--  <script type="text/javascript" src="/js/jquery.easing.1.1.1.js"></script>  -->

<script src="/js/jquery.cookie.js" ></script>
 <script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
<script  type="text/javascript" src="/js/baza812.js"></script>
<link rel="stylesheet" type="text/css" href="/css/filter_main.css" />
<link rel="stylesheet" type="text/css" href="/css/search.css" />
<link href='https://code.cdn.mozilla.net/fonts/fira.css' rel='stylesheet' type='text/css' />
	

<style>
@import url(/css/style.css);

      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 540px; width: 620px; }

body {
   /*background-color:#CCFFFF*/
   background-image: url("/img/St-Petersburg.jpg")
}


#item {}
#item h1 {font: 700 28px/30px "Fira Sans"; color: black; text-align: left; padding-top: 30px;}
#item .breadcrumbs {color: #9B9B9B; margin-bottom: 30px;}
#item .breadcrumbs a {color: #4579A6;}
#item .timestamp {color: #9B9B9B; background: url(/img/icon-timestamp.png) no-repeat left center; padding-left: 25px; float: right;}

#item .info-box {background: /*#FBFAF6*/ white; overflow: hidden;}
#item .info-box .left-column {width: 620px; height: 540px; display: block; float: left; background: grey; box-shadow: 0px 0px 10px rgba(0,0,0,0.5);}
#item .info-box .right-column {width: 300px; text-align: center; display: block; float: left; padding: 30px 0px 30px 20px}

#item .info-box .price {font: 700 42px/60px "Fira Sans"; color: #4579A6;}
#item .info-box .price span {font: 500 italic 24px/30px "Fira Sans"; color: #4579A6; display: block;}
#item .info-box .features {width: 240px; height: 90px; display: block; background: lightgray; margin: auto;}
#item .info-box .owner-name {font: italic 18px/30px "Fira Sans"; color: #4A4A4A;}
#item .info-box .owner-phone {font: 700 28px/60px "Fira Sans"; color: #4A4A4A; color: #4A4A4A;}

#item .info-box form {}



#item .info-box form input {
	font: 18px/30px "Fira Sans";
	box-sizing: border-box;
	height: 45px;
	text-align: center;
	border-radius: 4px;
	padding: 0px 20px
}

#item .info-box form div {
	font: 18px/30px "Fira Sans";
	box-sizing: border-box;
	height: 45px;
	text-align: center;
	border-radius: 4px;
	padding: 0px 20px
}

#item .info-box form input[type="text"] {
	border: 1px solid #4579A6; 
	border-radius: 4px;
	margin-bottom: 15px;
}

#item .info-box div input[type="text"] {
	border: 1px solid #4579A6; 
	border-radius: 4px;
	margin-bottom: 15px;
	text-align:center;
}

#item .info-box form input[type="submit"] {
	border: 1px solid #4579A6; 
	border-radius: 4px;
	background: #4579A6;
	color: white;
	cursor: pointer;
}

#item .info-box div input[type="submit"] {
	border: 1px solid #4579A6; 
	border-radius: 4px;
	background: #4579A6;
	color: white;
	cursor: pointer;
}

#item .info-box form input[type="button"] {
	border: 1px solid #4579A6; 
	border-radius: 4px;
	background: #4579A6;
	color: white;
	cursor: pointer;
}

#item .info-box div input[type="button"] {
	border: 1px solid #4579A6; 
	border-radius: 4px;
	background: #4579A6;
	color: white;
	cursor: pointer;
}
#item .info-box div input[type="button"]:hover {
	border: 1px solid #4579A6; 
	border-radius: 5px;
	background: #4579A6;
	color: white;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);
	cursor: pointer;
}


#item .info-box form .wrong-password {color: red; font-size: 16px; visibility: hidden;}

#item .info-box div .wrong-password {color: red; font-size: 16px; visibility: hidden;}

.buy-password {
	border: 2px solid #4579A6;
	text-decoration: none;
	color: #4579A6;
	border-radius: 4px;
	height: 45px;
	width: 145px;
	line-height: 45px;
	display: block;
	float: left;
	margin: 15px 0px 0px 15px;
}

.buy-password:hover {
	background: #4579A6;
	color: white;
}

.get-for-free {
	font: italic 16px/20px "Fira Sans";
	color: #4A4A4A;
	display: block;
	text-align: left;
	float: right;
	padding: 19px 40px 0px 0px;
}


.photo-map-panorama {margin: 8px 0px 8px 138px;}
.photo-map-panorama input[type="radio"] {display: none;}
.photo-map-panorama input[type="radio"] + label { 
	display: block;
	float: left;
	line-height: 44px;
	height: 44px;
	padding: 0px 20px 0px 20px;
	border-top: 1px solid #BCBCBC;
	border-bottom: 1px solid #BCBCBC;
	border-left: 1px solid #BCBCBC;
	cursor: pointer;
	display: block;
	box-sizing: border-box;
}

.photo-map-panorama label:nth-of-type(1) {
	border-radius: 4px 0px 0px 4px;
}

.photo-map-panorama label:last-child {
	border-right: 1px solid #BCBCBC;
	border-radius: 0px 4px 4px 0px;
}
.photo-map-panorama input[type="radio"]:checked + label {
	background: #f9f9f9;
	box-shadow: inset 0px 1px 3px 0px rgba(115, 77, 77, 1);
}


.item-description {
	width: 620px;
	font-family: "Fira Sans";
	color: #4A4A4A;
	padding-top: 30px;
	margin: 0px 20px 60px 0px;
}

.password-note {
	float: right;
	width: 300px;
	text-align: center;
	margin-top: -30px;
	color: #4579A6;
	font-style: italic;
}



.back-to-search, .add-to-favorites {
	text-decoration: none;
	color: white;
	background: #4579A6;
	line-height: 46px;
	display: inline-block;
	padding: 0px 20px;
	margin: 7px 22px 7px 0px;
	border-radius: 4px;
	cursor:pointer;
}

.back-to-search:hover, .add-to-favorites:hover {
	text-decoration: none;
	color: white;
	background: #4579A6;
	line-height: 46px;
	display: inline-block;
	padding: 0px 20px;
	margin: 7px 22px 7px 0px;
	border-radius: 4px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);
}
/* .add-to-favorites { */
/* 	background: #9B9B9B; */
/* } */


</style>
<title>Аренда квартир и комнат</title>
<!-- <link href="/img/logo.png" rel="shortcut icon"> -->
</head>
<body>


<div id="item" class="wrapper">
<div id="main-menu">
                <a class="logo" href="/"></a>
                <a class="menu-option" href="/howitworks/">Принцип работы</a>
                <a class="menu-option" href="/getpassword">Документы</a>
                <a class="menu-option" href="/byAccess">Оплата</a>
                <a class="add-item" href="/add-item">Сообщить о квартире</a>
           </div>

<?php echo $content; ?>

        
        <div id='paysto_verification-form'>
			<!-- begin paysto verification --> 
			<a href="http://paysto.ru/fromshop=22523" target="_blank">Совместно с PAYSTO</a> 
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
		<div style="float:right; margin-top: -55px; line-height: 20px; font-size:12px;">
			<b style="width:50px;">
				<a href="/contact">Если у вас возникли сложности — обратитесь в службу поддержки:</a>
				<br>
				+7 (965) 035-63-02, 6425123@gmail.com
			</b>
		</div>
</div>
     <div class="reveal-modal" id="metro" style="heigth: 100%;">
            
	<div class="p-regions" style="display: block; z-index: 20000; top: 41px; left: -473px; box-shadow: 0 1px 30px 0 rgba(0, 0, 0, 0.5);height: 506px;">
	    <span class="close"></span>

    	<div class="clr"></div>
		<div class="metro-map">
		    <?php // New Metro Map (4-68)
		    for( $i=4; $i<=68; $i++){ ?>
		    	<?php
		    		$act='';
		    		if(isset($_POST)){
		    			if(isset($_POST['Baza812Subscribe']['metro'])&&$_POST['Baza812Subscribe']['metro']){
		    				$metroIDS=explode(',',rtrim(strip_tags($_POST['Baza812Subscribe']['metro']),','));
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
		    		if(isset($_POST)){
		    			if(isset($_POST['Baza812Subscribe']['dictrict'])&&$_POST['Baza812Subscribe']['dictrict']){
		    				$dictrictIDS=explode(',',rtrim(strip_tags($_POST['Baza812Subscribe']['dictrict']),','));
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
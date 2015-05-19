<script type="text/javascript">

		var fenway = new google.maps.LatLng(<?php echo ($model->longitude)?$model->longitude:59.939039; ?>, <?php echo ($model->latitude)?$model->latitude:30.315785;?>);
		var mapZoom=<?php echo($model->longitude&&$model->latitude)?15:10?>
		
		function map() {
	    	var mapOptions = {
	        	center: fenway, 
	          	zoom: mapZoom,
	          	mapTypeId: google.maps.MapTypeId.ROADMAP
	        };
	        var map = new google.maps.Map(document.getElementById("map_canvas"),
	            mapOptions);
	      	}
	

/**************** for panorama */
		var map;
		var sv = new google.maps.StreetViewService();
		var panorama;
		function pan() {
			  panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'));
			  sv.getPanoramaByLocation(fenway, 200, processSVData);
		}
		function processSVData(data, status) {
		  if (status == google.maps.StreetViewStatus.OK) {
		    
		    panorama.setPano(data.location.pano);
		    panorama.setPov({
		      heading: 270,
		      pitch: 0
		    });
		    panorama.setVisible(true);
		  } else {
		    alert('Street View data not found for this location.');
		  }
		}
/**************** for panorama */
 

	function showpan(){
		$('#pano').attr("style", "visibility: visible; height:540px; width:620px;");
		$('#map_canvas').attr("style", "visibility: hidden; height:0px; width:0px;");
		$('#photos').attr("style", "visibility: hidden; height:0px; width:0px;")
		pan();				
	}
	function showmap(){
		$('#map_canvas').attr("style", "visibility: visible; height:540px; width:620px;");
		$('#pano').attr("style", "visibility: hidden; height:0px; width:0px;");
		$('#photos').attr("style", "visibility: hidden; height:0px; width:0px;")
		map();
	}
	function showphoto(){
		$('#photos').attr("style", "visibility: visible; height:540px; width:620px;");
		$('#map_canvas').attr("style", "visibility: hidden; height:0px; width:0px;");
		$('#pano').attr("style", "visibility: hidden; height:0px; width:0px;")
		photoshow();
	}
	
      $(document).ready(function(){ 
				map();
       });


</script>
<style>
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 540px; width: 620px; }
	  #pano{height: 540px; width: 620px;}
	  #photos{height: 540px; width: 620px;}
</style>

<?php $aObjectType2 = array(1 => 'Однокомн. кв.', 'Двухкомн. кв.', 'Трехкомн. кв.', 'Четырехкомн. кв.',
		 'Пятикомн. кв.',	'Многокомн. кв.', 'Комната в 2-ккв', 'Комната в 3-ккв', 'Комната в 4-ккв', 
		'Комната в 5-ккв', 'Комната в Многокомн. кв.', 'Две комнаты в 3-ккв', 'Две комнаты в 4-ккв',
		 'Две комнаты в 5-ккв', 'Две комнаты в Многокомн. кв.');?>
		 
<a class="back-to-search" href="">← Вернуться к поиску</a>
<a class="add-to-favorites" href="">Добавить в избранное</a>



<h1><?php echo $aObjectType2[$model->ObjectsDovType->id]?>, <?php echo $model->ObjectsDovStreets->name.', '; echo $model->building_number?></h1>
<p class="timestamp"><?php list($date, $time)=explode(' ',$model->date_add); echo 'Добавлен '.date('d.m.Y',strtotime($date))?></p> 
<p class="breadcrumbs">Санкт-Петербург / <a href="">аренда квартир</a> / <a href=""><?php echo 'м. '.$model->ObjectsMetro->ObjectsDovMetro->name?></a> / №<?php echo $model->id_object?></p>

<div class="info-box">
	<div class="left-column">
		<div id="map_canvas"></div>
		<div class="photos" id='photos'></div>
		<div class="panorama" id='pano'></div>
	</div>
	<div class="right-column">
		<p class="price"><?php echo $model->price?> <span> в месяц</span></p>
		<div class="features">
			<div style='text-align: left; font: italic 14px/20px "PT Sans"; margin-left:10px; padding-top:5px;'>
			<?php if($model->ObjectsMoreinfo->internet==1):?>
				<img  width="13px" title='Интернет' src='/img/sp4.png'> <span style='margin-left: 15px;'>Интернет</span> <br>
			<?php endif;?>
			<?php if($model->ObjectsMoreinfo->washer==1):?>
				<img width='13px' title='Стиральная Машинка' src='/img/sp2.png'> <span style='margin-left: 15px;'>Стиральная Машинка</span><br>
			<?php endif;?>
			<?php if($model->ObjectsMoreinfo->fridge==1):?>
				<img width='13px' title='Холодильник' src='/img/sp1.png'> <span style='margin-left: 15px;'>Холодильник</span> <br>
			<?php endif;?>
			<?php if($model->ObjectsMoreinfo->furniture==1):?>
				<img width='13px' title='Мебель' src='/img/sp3.png'> <span style='margin-left: 15px;'>Мебель</span> 
			<?php endif;?>
			</div>
		</div>
		<p class="owner-name">Владелец: <?php echo $model->Owners->name?></p>
		<p class="owner-phone">+7 <?php echo substr_replace($model->Owners->phone_1, 'XXX', 5, 3)?></p>
		<form class="open-contact">
			<input type="text" placeholder="Введите пароль">
			<input type="submit" value="Показать телефон ">
			<p class="wrong-password">Этот пароль не подходит :(</p>
		</form>
		<div class="get-acces">
			<a class="buy-password" href="">Купить пароль</a>
			<a class="get-for-free" href="">Получить<br/> бесплатно</a>
		</div>
	</div>
</div>




<fieldset class="photo-map-panorama">
	<input id="c1" name="photo-map-panorama" type="radio" onclick='showphoto()'/>
	<label for="c1"><span>Фотографии</span></label>
	
	<input id="c2" name="photo-map-panorama" type="radio" checked="checked" onclick='showmap()'/>
	<label for="c2"><span>Карта</span></label>
	
	<input id="c3" name="photo-map-panorama" type="radio" onclick='showpan()'/>
	<label for="c3"><span>Панорама</span></label>
</fieldset>


<p class="password-note">Телефонный номер владельца квартиры скрыт. Для просмотра объявления вам нужен пароль для открытия контактов.</p>

<p class="item-description">
	<?php echo $model->note;?>
</p>


<a class="back-to-search" href="">← Вернуться к поиску</a>
<a class="add-to-favorites" href="">Добавить в избранное</a>

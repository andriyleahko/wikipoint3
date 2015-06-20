
<script type="text/javascript">
        
    var Data = '';
    
    
    function getCoordinate() {
        $.ajax({
            async: false,
            url: '/item/getCoordinate?address=<?php echo 'Санкт-Петербург, ';echo ($model->ObjectsDovStreets->name) ? $model->ObjectsDovStreets->name : '' . ', ';echo ($model->building_number) ? $model->building_number : '' ?>&key=AIzaSyDLPXMgcCP2NtQaJqvz0EwP6LxR4vsb1sY',
            type: 'get',
            success : function(data) {
                Data = JSON.parse( data );
                
            }
        })
    }
    
    getCoordinate();    
    
    var lat = Data.results[0].geometry.location.lat;
    var lng = Data.results[0].geometry.location.lng;
    
        

// пошук координат за адресом
    
    var fenway = new google.maps.LatLng(lat, lng);
    var mapZoom = 15;
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



    function showpan() {
        $('#pano').attr("style", "visibility: visible; height:540px; width:620px;");
        $('#map_canvas').attr("style", "visibility: hidden; height:0px; width:0px;");
        $('#photo').attr("style", "visibility: hidden; height:0px; width:0px;")
        pan();
    }
    function showmap() {
        $('#map_canvas').attr("style", "visibility: visible; height:540px; width:620px;");
        $('#pano').attr("style", "visibility: hidden; height:0px; width:0px;");
        $('#photo').attr("style", "visibility: hidden; height:0px; width:0px;")
        map();
    }
    function showphoto() {
        $('#photo').attr("style", "visibility: visible; height:540px; width:620px;");
        $('#map_canvas').attr("style", "visibility: hidden; height:0px; width:0px;");
        $('#pano').attr("style", "visibility: hidden; height:0px; width:0px;")

    }

    $(document).ready(function () {
        map();
        $('#photo').attr("style", "visibility: hidden; height:0px; width:0px;");


        $('#scrollLeft').cycle({
            fx: 'scrollHorz',
            speed: 1000,
            timeout: 5000,
            prev: '#prev',
            next: '#next'
        });

    	if($('#c1').attr('checked')){
   		 showphoto();
   		$('#c1').attr('checked','checked');	
   	}
    });

</script>
<style>
    html { height: 100% }
    body { height: 100%; margin: 0; padding: 0 }
    #map_canvas { height: 540px; width: 620px; }
    #pano{height: 540px; width: 620px;}
    #photo{height: 540px; width: 620px;}
    #control{top:10px !important;}
</style>

<?php
$aObjectType2 = array(1 => 'Однокомн. кв.', 'Двухкомн. кв.', 'Трехкомн. кв.', 'Четырехкомн. кв.',
    'Пятикомн. кв.', 'Многокомн. кв.', 'Комната в 2-ккв', 'Комната в 3-ккв', 'Комната в 4-ккв',
    'Комната в 5-ккв', 'Комната в Многокомн. кв.', 'Две комнаты в 3-ккв', 'Две комнаты в 4-ккв',
    'Две комнаты в 5-ккв', 'Две комнаты в Многокомн. кв.');
?>

<a class="back-to-search" href='/catalog/search'>← Вернуться к поиску</a>
<a class="add-to-favorites" title="<?php echo $aObjectType2[$model->ObjectsDovType->id] ?>, <?php echo $model->ObjectsDovStreets->name . ', ';
echo $model->building_number ?>" rel="sidebar" href="">Добавить в избранное</a>



<h1><?php echo $aObjectType2[$model->ObjectsDovType->id] ?>, <?php echo $model->ObjectsDovStreets->name . ', ';
echo $model->building_number ?></h1>
<p class="timestamp"><?php list($date, $time) = explode(' ', $model->date_add);
            echo 'Добавлен ' . date('d.m.Y', strtotime($date)) ?></p> 
<p class="breadcrumbs" id='adres'>Санкт-Петербург / <a href="">аренда квартир</a> / <a href=""><?php echo 'м. ' . $model->ObjectsMetro->ObjectsDovMetro->name ?></a> / №<?php echo $model->id_object ?></p>

<div class="info-box">
    <div class="left-column">
        <div id="map_canvas"></div>
        <div class="photos" id='photo'>
            <?php if (isset($model->Pictures) && $model->Pictures) { ?>
                <div id="scrollLeft">
                <?php foreach ($model->Pictures as $pic): ?>
                        <img style='height: 540px; width: 620px; text-align:center;' src="<?php echo 'http://grandprime.info/' . $pic['file']; ?>" />
    <?php endforeach; ?>
                </div>
                <div id='control'>
                    <a href="#"><span id="prev">Prev</span></a> 
                    <a href="#"><span id="next">Next</span></a>
                </div>
                <?php } else { ?>
                <img style='height: 540px; width: 620px; text-align:center;' src="http://grandprime.info/images/no-photo.jpg" />
                <?php } ?>
        </div>
        <div class="panorama" id='pano'></div>
    </div>
    <div class="right-column">
        <p class="price"><?php echo $model->price ?> <span> в месяц</span></p>
        <div class="features" style='padding-top: 17px; background: transparent; height: 70px;'>
            <div style='text-align: center; font: italic 14px/20px "PT Sans"; padding-top:5px;'>
                <?php if ($model->ObjectsMoreinfo->furniture == 1): ?>
                    <img title='Мебель' src='/img/mebel.png'>  
                <?php endif; ?>
<?php if ($model->ObjectsMoreinfo->fridge == 1): ?>
                    <img title='Холодильник' src='/img/holod.png'> 
<?php endif; ?>
<?php if ($model->ObjectsMoreinfo->washer == 1): ?>
                    <img title='Стиральная Машинка' src='/img/pralka.png'> 
<?php endif; ?>
<?php if ($model->ObjectsMoreinfo->internet == 1): ?>
                    <img  title='Интернет' src='/img/internet.png'> 
<?php endif; ?>
            </div>
        </div>
        <p class="owner-name">Владелец: <?php echo $model->Owners->name ?></p>
        <input type='hidden' id='obectId' value="<?php echo $model->id_object?>">
        <p class="owner-phone">+7 <?php echo (isset($opened)&&$opened)?$model->Owners->phone_1:substr_replace($model->Owners->phone_1, 'XXX', 5, 3) ?></p>
        <div class="open-contact" method="get">
            <input type="text" id='pasword' placeholder="Введите пароль">
            <input type="button" id='showphone' value="Показать телефон ">
            <p class="wrong-password">Этот пароль не подходит :(</p>
        </div>
        <div class="get-acces">
            <a class="buy-password" href="">Купить пароль</a>
            <a class="get-for-free" href="">Получить<br/> бесплатно</a>
        </div>
    </div>
</div>




<fieldset class="photo-map-panorama">
    <input id="c1" name="photo-map-panorama"  type="radio" <?php  if (isset($model->Pictures) && $model->Pictures){echo "checked='checked'";}?> onclick='showphoto()'/>
    <label for="c1"><span>Фотографии</span></label>

    <input id="c2" name="photo-map-panorama" type="radio" <?php  if (isset($model->Pictures) && $model->Pictures){echo "";}else{echo "checked='checked'";}?> onclick='showmap()'/>
    <label for="c2"><span>Карта</span></label>

    <input id="c3" name="photo-map-panorama" type="radio" onclick='showpan()'/>
    <label for="c3"><span>Панорама</span></label>
</fieldset>


<p class="password-note">Телефонный номер владельца квартиры скрыт. Для просмотра объявления вам нужен пароль для открытия контактов.</p>

<p class="item-description">
<?php echo $model->note; ?>
</p>


<a class="back-to-search" >← Вернуться к поиску</a>
<a class="add-to-favorites" title="<?php echo $aObjectType2[$model->ObjectsDovType->id] ?>, <?php echo $model->ObjectsDovStreets->name . ', ';
echo $model->building_number ?>" rel="sidebar" href="">Добавить в избранное</a>




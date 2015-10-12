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
    
    function showmap() {
    	$('#map_canvas').empty();
        $('#map_canvas').attr("style", "visibility: visible; height:540px; width:620px;");
        map(lat,lng,'',1);
    }

    $(document).ready(function () {
        map(lat,lng,'',1);
    });

</script>
<style>
    html { height: 100% }
    body { height: 100%; margin: 0; padding: 0 }
    #map_canvas { height: 540px; width: 620px; }
    #pano{height: 540px; width: 620px;}
    #photo{height: 540px; width: 620px;}
    #control{top:10px !important;}
    

#galoba{
display:none;
}

#complains textarea{
    font: 300 16px/20px "Fira Sans";
    height: 74px;
    margin-left: -8px;
    width: 248px;  
}

#complain-button{
background: #8ec549 none repeat scroll 0 0;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    font: 700 18px/44px "Fira Sans";
    width: 260px;
}
#complain-button:hover {
background: #8abf47 none repeat scroll 0 0;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    font: 700 18px/44px "Fira Sans";
    width: 260px;
}

.ui-dialog{
z-index: 1001;
width: 307px;
}

.inp {
 height: 13px;
}

.metro11 {
    background: rgba(0, 0, 0, 0) url("") no-repeat scroll left center;
    
    font-size: 16px;
}

.line-1 {
    background-image: url("/img/metro-line-1.png");
    color: #ff0000;
    padding-left: 32px;
    text-align: left;
}
.line-2 {
    background-image: url("/img/metro-line-2.png");
    color: #0080ff;
    padding-left: 32px;
    text-align: left;
}

.line-3 {
    background-image: url("/img/metro-line-3.png");
    color: #008000;
    padding-left: 32px;
    text-align: left;
}

.line-4 {
    background-image: url("/img/metro-line-4.png");
    color: #ff8040;
    padding-left: 32px;
    text-align: left;
}

.line-5 {
    background-image: url("/img/metro-line-5.png");
    color: #702785;
    padding-left: 32px;
    text-align: left;
}
</style>

<?php

		Yii::app()->clientScript->scriptMap=array(
				'jquery.js'=>false,
		);
$aObjectType2 = array(1 => '1 комнатная квартира', 
		'2 комнатная квартира', 
		'3 комнатная квартира', 
		'4 комнатная квартира', 
		'5 комнатная квартира', 
		'Мн комнатная квартира', 
		'комната 1(2)', 
		'комната 1(3)', 
		'комната 1(4)', 
		'комната 1(5)', 
		'комната 1(>5)', 
		'2 комнаты 2(3)',
		 '2 комнаты 2(4)', 
		'2 комнаты 2(5)', 
		'2 комнаты 2(>5)');?>

<div style='background:white; width:960px; margin-left:-10px; padding:10px;'>
<a class="back-to-search" href="<?php echo Yii::app()->request->getUrlReferrer()?>">← Вернуться к поиску</a>
<a class="add-to-favorites" title="<?php echo $aObjectType2[$model->ObjectsDovType->id] ?>, <?php echo $model->ObjectsDovStreets->name . ', ';
echo $model->building_number; ?>" rel="sidebar" href="">Добавить в избранное</a>


<p class="timestamp"><?php echo dateTimeAgo($model->date_add); ?></p> 
<p class="breadcrumbs" id='adres'>Санкт-Петербург / <a href="/catalog/search?rooms-amount[]=1&rooms-amount[]=2&rooms-amount[]=3&rooms-amount[]=4,5,6&search=1">аренда квартир</a> / <a href="/catalog/search?search=1&metro=m_<?php echo $model->ObjectsMetro->ObjectsDovMetro->id;?>"><?php echo 'м. ' . $model->ObjectsMetro->ObjectsDovMetro->name ?></a> / № <?php echo $model->id_object ?></p>

<div class="info-box">
    <div class="left-column">
        <div id="map_canvas"></div>
    </div>
    <div class="right-column">
    <div style='font-size:25px; text-align: left; font-weight: 700; margin-top: -35px;'>
    	<?php echo $aObjectType2[$model->ObjectsDovType->id] ?>
    </div>
                <p class="metro11 line-<?php echo $model->ObjectsMetro->ObjectsDovMetro->metro_line?>"> 
                    <?php
                    if ($model->ObjectsMetro->ObjectsDovMetro->name) {
                        echo $model->ObjectsMetro->ObjectsDovMetro->name;
                    }
                    ?>
                </p>     
    <div style='text-align:left; font-size: 16px; color: #4579a6; font-weight: 600;	'>
    	<?php echo $model->ObjectsDovStreets->name . ', '; echo $model->building_number ?>
	</div>
        <p class="price"><?php echo substr_replace($model->price, ' 000', -3) ?> <span> в месяц</span></p>
        <div class="features" style='padding-top: 17px; background: transparent; height: 70px;'>
            <div style='text-align: center; font: italic 14px/20px "PT Sans"; padding-top:5px;'>
                <?php if ($model->ObjectsMoreinfo->furniture == 1){ ?>
                    <img title='Мебель' src='/img/mebel.png'>  
                <?php }else{?>
                	<img title='нет мебели' src='/img/no-mebel.png'>  
				<?php }?>
<?php if ($model->ObjectsMoreinfo->fridge == 1){ ?>
                    <img title='Холодильник' src='/img/holod.png'> 
<?php }else{?>
				<img title='нет холодильника' src='/img/no-holod.png'>
<?php }?>
<?php if ($model->ObjectsMoreinfo->washer == 1){ ?>
                    <img title='Стиральная Машинка' src='/img/pralka.png'> 
<?php }else{?>
					<img title='нет стиральной машинки' src='/img/no-pralka.png'>
<?php }?>
<?php if ($model->ObjectsMoreinfo->internet == 1){ ?>
                    <img  title='Интернет' src='/img/internet.png'> 
<?php }else{?>
					<img  title='нет интернета' src='/img/no-internet.png'>
<?php }?>
            </div>
        </div>
        <p class="owner-name">Владелец: <?php echo $model->Owners->name ?></p>
        <input type='hidden' id='obectId' value="<?php echo $model->id_object?>">
        <p class="owner-phone">+7 <?php echo (isset($opened)&&$opened)?$model->Owners->phone_1:substr_replace($model->Owners->phone_1, 'XXX', 5, 3) ?></p>
        <div class="open-contact" method="get">
            <input type="text" id='pasword' placeholder="Введите пароль">
            <input type="button" id='showphone' value="Показать телефон ">
            <span style="<?php echo (show_number_if_old($model->date_add))?'dispaly: block; visibility:visible; color:red;':'dispaly: none; visibility:hidden; ';?>"> Возмножно сдано</span>
            <p class="wrong-password">Этот пароль не подходит :(</p>
        </div>
        <div class="get-acces">
            <a class="buy-password" href="/byAccess">Купить пароль</a>
            <a class="get-for-free" href="/getpassword">Получить<br/> бесплатно</a>
        </div>
    </div>
</div>

<script type="text/javascript">
	var str=$('.owner-phone').text();
    if(str.indexOf('XXX') + 1) {
    	// тел скрыто
     }else{
    		// тел открыто
 	$('#showphone').val('Пожаловаться');
         }
                   
</script>

    <script src="/js/jquery.jcarousellite.js"></script>
    

 <link rel="stylesheet" media="all" type="text/css" href="/css/style-demo.css">
 
<div class="photo-map-panorama">
	<?php if (isset($model->Pictures) && $model->Pictures) { ?>
		<div id="jcl-demo">
		    <div class="custom-container scrollMore">
		        <a href="#" class="prev">&lsaquo;</a>
		        <div class="carousel">
		            <ul>
			            <?php $i=1; foreach ($model->Pictures as $pic): ?>
		                	<li>
		                		<a class="fancy" rel="example_group<?php echo $model->id_object ?>" href="<?php echo Yii::app()->params['imgDomain'].'/' . $pic['file'];?>">
		                		<img style="padding-left:2px;padding-right:2px; width: 130px; height: 90px;" src="<?php echo Yii::app()->params['imgDomain'].'/' . $pic['file']; ?>"/></a>
		                	</li>
		                <?php endforeach; ?>
		            </ul>
		        </div>
		        <a href="#" class="next">&rsaquo;</a>
		        <div class="clear"></div>
		    </div>
		</div>
	<?php } ?>	    
    <?php if ($model->Pictures) : ?>
		<?php foreach ($model->Pictures as $k => $pic) : ?>
			<?php if ($k): ?><a class="fancy" rel="example_group<?php echo $model->id_object ?>" style="display:none" href="<?php echo Yii::app()->params['imgDomain'];?>/<?php echo $pic->file ?>"> </a><?php endif; ?>
        <?php endforeach; ?>
	<?php endif; ?>             
</div>


    <script type="text/javascript">
    $(function() {
        $(".scrollMore .carousel").jCarouselLite({
            btnNext: ".scrollMore .next",
            btnPrev: ".scrollMore .prev",
            scroll: 1,
            <?php if (isset($model->Pictures) && $model->Pictures){
            					if(count($model->Pictures)>3){
            						echo 'visible: 3';
            					}else{
            						echo 'visible:'.count($model->Pictures);
            					}
            			} ?>, 
        });
    });
    </script>
<p class="password-note">Телефонный номер владельца квартиры скрыт. Для просмотра объявления вам нужен пароль для открытия контактов.

</p>
<p class="item-description">
<?php echo $model->note; ?>
</p>


</div>


<?php
// Dialog 1 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'object-complaint',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Пожаловаться на объект',
        'autoOpen'=>false,
        'draggable'=>false,
        'resizable'=>false,
        'modal'=>'true',
        'height'=>'auto',
        'width'=>'auto;',
        'htmlOptions'=>array('style'=>"display:none;"),
    ),));?>
<form id="complains">
    <div><label><input class='inp check' type="radio" name="group2" checked/>Агент</label></div>
<?php if(!show_number_if_old($model->date_add)):?>   
    <div><label><input class='inp' type="radio" name="group2"/>Сдано</label></div>
<?php endif;?>    
    <div><label><input class='inp' type="radio" name="group2"/>Иное</label></div>
    <input type="hidden" id='id_ob' name="id_ob" value="<?php echo $model->id_object;?>"/>
    <p id='wrong-t' style='color:red; font-size:12px;'></p>
    <textarea name='galoba' id='galoba' placeholder='Обезательно для заполнения'></textarea>
    <div><input id='complain-button' type="button" value='Пожаловаться' onclick="sComplain(this);"></div>
</form>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>

<script type="text/javascript">
    $(document).ready(function () {
        $("a[rel^='example_group']").fancybox();
        <?php if(count($model->Pictures)==2){
        	echo "$('.photo-map-panorama').attr('style','margin: -30px 0 0 145px;');";
        }?>
        <?php if(count($model->Pictures)==1){
        	echo "$('.photo-map-panorama').attr('style','margin: -30px 0 0 210px;');";
        }?>
        <?php if(count($model->Pictures)==0){
        	echo "$('.photo-map-panorama').attr('style','margin: 0px 0px 0px 0px;');";
        }?>
    })
</script>
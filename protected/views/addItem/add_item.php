<script>
$('#main-search').empty();
$('#main-search').attr('style','display:none');
</script>

<style>
.wide-label {line-height: 60px;}
.wide-label span {width: 270px; display: inline-block; text-align: right; margin-right: 30px;}

input {
border: 1px solid #BCBCBC; 
font: 18px/30px "Fira Sans"; 
height: 45px; 
border-radius: 4px; 
padding: 0px 10px; 
box-sizing: border-box; 
margin-left: -4px; 
display: inline-block;
width: 252px;
background:#e3e3e3;}

.short-input {width: 252px; text-align: center;}
.wide-input {width: 252px;}

input[type="radio"] {display: none; }
input[type="radio"] + label {display: block; float: left; line-height: 42px; padding: 0px 20px 0px 20px; border: 1px solid #5c80a4; box-sizing: border-box; border-left: none; cursor: pointer; margin: 8px 0px; background-color:#a6a6a6}
input[type="radio"] + label:nth-of-type(1){border-left: 1px solid #5c80a4; border-radius: 4px 0px 0px 4px; }
label:last-child {border-right: 1px solid #5c80a4; border-radius: 0px 4px 4px 0px; background-color:#a6a6a6}
input[type="radio"]:checked + label {background: #5c80a4; box-shadow: inset 0px 1px 5px 0px rgba(0, 0, 0, 0.50);  } 


select {
height: 44px; 
font: 18px/30px "Fira Sans"; 
padding: 0px 20px 0px 20px; 
border: 1px solid #5c80a4; 
box-sizing: border-box; 
margin: 0px; 
margin-left: -4px; 
background-color:#a6a6a6; 
width: 320px;
}


input[type="checkbox"] {display: none;}
input[type="checkbox"] + label {display: block; float: left; line-height: 42px; padding: 0px 20px 0px 20px; border: 1px solid #5c80a4;; border-left: none; cursor: pointer; margin: 8px 0px; background-color:#a6a6a6}
input[type="checkbox"] + label:nth-of-type(1){border-left: 1px solid #5c80a4; border-radius: 4px 0px 0px 4px; background-color:#a6a6a6}
label:last-child {border-right: 1px solid #BCBCBC; border-radius: 0px 4px 4px 0px; background-color:#a6a6a6}
input[type="checkbox"]:checked + label {background: #5c80a4; box-shadow: inset 0px 1px 5px 0px rgba(0, 0, 0, 0.50);}


textarea {
vertical-align: top; 
margin-top: 8px; 
margin-bottom: 8px; 
border: none; 
border: 1px solid #BCBCBC; 
font: 18px/30px "Fira Sans"; min-height: 134px; min-width: 400px; padding: 0px 10px; border-radius: 4px; box-sizing: border-box; margin-left: -4px; }


.break-line {border-bottom: 1px solid #BCBCBC; box-sizing: border-box; line-height: 29px; color: #BCBCBC; margin-bottom: 30px; }

input[type="submit"] {margin-top: 8px; margin-left: 300px; margin-bottom: 30px; background: #8ec549; color: white; border: none; padding: 0px 20px 0px 20px; cursor: pointer; font-weight:bold; font-size:23px;}


</style>





<div style='background-color: white; margin-left:-10px; width:960px;'>
<h1 style='margin-left: -10px; width: 960px; background-color: white;'>Добавление нового<br> объекта в базу</h1>
<p class="subheader"><span class="sh">процедура занимает около 5 минут</span></p>
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data'));?>
<?php echo CHtml::errorSummary($model,null,null,array('style'=>'color:red'));?>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div style="color: blue;" class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<p class="wide-label">
	<span style="float: left;">Сдаётся:</span>
	<fieldset class="">
                <input onchange="selectRoomFlat(this); return false;" value="flat" <?php if (isset($_POST['AddObjectForm']['room_flat'])): ?><?php if ($_POST['AddObjectForm']['room_flat'] == 'flat') : ?>checked="checked"<?php endif; ?><?php else: ?>checked="checked"<?php endif; ?> type="radio" name="AddObjectForm[room_flat]" id="flat" >
		<label for="flat"><span>квартира</span></label>
		
		<input onchange="selectRoomFlat(this); return false;" value="room" <?php if (isset($_POST['AddObjectForm']['room_flat'])): ?><?php if ($_POST['AddObjectForm']['room_flat'] == 'room') : ?>checked="checked"<?php endif; ?><?php endif; ?> type="radio" name="AddObjectForm[room_flat]" id="room">
		<label for="room"><span>комната</span></label>
	</fieldset>
</p>



<p class="wide-label">
	<span>Количество комнат:</span>
	<select id="sel-flat" data-type="flat" <?php if (isset($_POST['AddObjectForm']['room_flat'])): ?><?php if ($_POST['AddObjectForm']['room_flat'] == 'flat') : ?> style="display:none" <?php endif;?><?php endif;?> name="AddObjectForm[flat]">
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '1') : ?> selected="selected" <?php endif;?><?php endif;?> value="1">1 ККВ</option>
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '2') : ?> selected="selected" <?php endif;?><?php endif;?> value="2">2 ККВ</option>
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '3') : ?> selected="selected" <?php endif;?><?php endif;?> value="3">3 ККВ</option>
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '4') : ?> selected="selected" <?php endif;?><?php endif;?> value="4">4 ККВ</option>
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '5') : ?> selected="selected" <?php endif;?><?php endif;?> value="5">5 ККВ</option>
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '6') : ?> selected="selected" <?php endif;?><?php endif;?> value="6">Многокомн.</option>
                
	</select>
	<select id="sel-room" <?php if (isset($_POST['AddObjectForm']['room_flat'])): ?><?php if ($_POST['AddObjectForm']['room_flat'] == 'room') : ?> style="display:none" <?php endif;?><?php else: ?>style="display:none"<?php endif;?> data-type="room" name="AddObjectForm[rooms]">
            <option <?php if (isset($_POST['AddObjectForm']['rooms'])): ?><?php if ($_POST['AddObjectForm']['rooms'] == '7') : ?> selected="selected" <?php endif;?><?php endif;?>  selected="selected" value="7">1(2)ккв</option>
            <option <?php if (isset($_POST['AddObjectForm']['rooms'])): ?><?php if ($_POST['AddObjectForm']['rooms'] == '8') : ?> selected="selected" <?php endif;?><?php endif;?>  value="8">1(3)ккв</option>
            <option <?php if (isset($_POST['AddObjectForm']['rooms'])): ?><?php if ($_POST['AddObjectForm']['rooms'] == '9') : ?> selected="selected" <?php endif;?><?php endif;?>  value="9">1(4)ккв</option>
            <option <?php if (isset($_POST['AddObjectForm']['rooms'])): ?><?php if ($_POST['AddObjectForm']['rooms'] == '10') : ?> selected="selected" <?php endif;?><?php endif;?> value="10">1(5)ккв</option>
            <option <?php if (isset($_POST['AddObjectForm']['rooms'])): ?><?php if ($_POST['AddObjectForm']['rooms'] == '11') : ?> selected="selected" <?php endif;?><?php endif;?>  value="11">1(мн)ккв</option>
            <option <?php if (isset($_POST['AddObjectForm']['rooms'])): ?><?php if ($_POST['AddObjectForm']['rooms'] == '12') : ?> selected="selected" <?php endif;?><?php endif;?>  value="12">2(3)ккв</option>
            <option <?php if (isset($_POST['AddObjectForm']['rooms'])): ?><?php if ($_POST['AddObjectForm']['rooms'] == '13') : ?> selected="selected" <?php endif;?><?php endif;?>  value="13">2(4)ккв</option>
            <option <?php if (isset($_POST['AddObjectForm']['rooms'])): ?><?php if ($_POST['AddObjectForm']['rooms'] == '14') : ?> selected="selected" <?php endif;?><?php endif;?>  value="14">2(5)ккв</option>
            <option <?php if (isset($_POST['AddObjectForm']['rooms'])): ?><?php if ($_POST['AddObjectForm']['rooms'] == '15') : ?> selected="selected" <?php endif;?><?php endif;?>  value="15">2(мн)ккв</option>
                
	</select>
</p>


<?php /*
<p class="wide-label">
	<span  class="wide-label">Адрес:</span>
	<input class="wide-input" type="text" name="AddObjectForm[address]" value="<?php if (isset($_POST['AddObjectForm']['address'])): ?><?php echo $_POST['AddObjectForm']['address'] ?><?php endif;?>" />
</p> */ ?>

<p class="wide-label">
	<span  class="wide-label">Район:</span>
        <select name="AddObjectForm[district]">
                <?php foreach ($district as $d): ?>
                    <option id="<?php echo 'DD'.$d->id?>" <?php if (isset($_POST['AddObjectForm']['district'])): ?><?php if ($_POST['AddObjectForm']['district'] == $d->id) : ?> selected="selected" <?php endif;?><?php endif;?> value="<?php echo $d->id ?>"><?php echo $d->name?></option>
                <?php endforeach;?>		
	   </select>
</p>

<?php // Убрать опцию ниизвестний район?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#DD1000').attr('style','display:none');
	})
</script>


<p class="wide-label">
	<span>Улица:</span>
	                <?php
                // Streets 
                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'id' => 'street_name',
                    'name' => 'Allstreets',
                   // 'value' => (isset($_POST['AddObjectForm']['street'])&&$_POST['AddObjectForm']['street'])?'':"",
                    'source' => '/addItem/autocompleteStreets',
                    'options' => array(
                        'showAnim' => 'fold',
                       // 'class' => 'full-width',
                    		'select'=>'js:function( event, ui ) {
                    		 	$.ajax({
        							url: "/addItem/getStreetId?namestr="+ui.item.value, 
        							type: "GET",
        							success: function (data) {
                    					dataJS = JSON.parse(data);
										if (dataJS.error==1){
                    						alert("Такой улицы не найдено!");
										}else{
											$("#street-field").val(dataJS.idStreet);
										}
        							}
    							});
           						return true;
        					}',
                    ),
                    'htmlOptions' => array(
                        'placeholder' => 'Улица',
                    	
                    ),
                ));
                
                ?>

                <input id="street-field" type='hidden' name="AddObjectForm[street]" value='1'/>
	<?php /*
      <select name="AddObjectForm[street]">
                <?php foreach ($street as $s): ?>
                    <?php if ($s->truename) : ?><option <?php if (isset($_POST['AddObjectForm']['street'])): ?><?php if ($_POST['AddObjectForm']['street'] == $s->id) : ?> selected="selected" <?php endif;?><?php endif;?> value="<?php echo $s->id ?>"><?php echo $s->truename?></option><?php endif;?>
                <?php endforeach;?>
		
	</select>
	*/?>
	
</p>

<p class="wide-label">
	<span  class="wide-label">Дом:</span>
        <input class="wide-input" type="text" name="AddObjectForm[house_no]" value="<?php if (isset($_POST['AddObjectForm']['house_no'])): ?><?php echo $_POST['AddObjectForm']['house_no'] ?><?php endif;?>" />
	
</p>


<p  class="wide-label">
	<span>Метро:</span>
	<select name="AddObjectForm[metro]">
                <?php foreach ($metro as $m): ?>
                    <option <?php if (isset($_POST['AddObjectForm']['metro'])): ?><?php if ($_POST['AddObjectForm']['metro'] == $m->id) : ?> selected="selected" <?php endif;?><?php endif;?> value="<?php echo $m->id ?>"><?php echo $m->name?></option>
                <?php endforeach;?>
		
	</select>
</p>
<p  class="wide-label">
	<span>Время до метро (мин.):</span>
	<input class="wide-input" name="AddObjectForm[time_to_metro]" type="text" value="<?php if (isset($_POST['AddObjectForm']['time_to_metro'])): ?><?php echo $_POST['AddObjectForm']['time_to_metro'] ?><?php endif;?>"/>
</p>
<p  class="wide-label">
    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	<select name="AddObjectForm[metro_to]">

            <option <?php if (isset($_POST['AddObjectForm']['metro_to'])): ?><?php if ($_POST['AddObjectForm']['metro_to'] == 2) : ?> selected="selected" <?php endif;?><?php endif;?> value="2">Пешком</option>
            <option <?php if (isset($_POST['AddObjectForm']['metro_to'])): ?><?php if ($_POST['AddObjectForm']['metro_to'] == 3) : ?> selected="selected" <?php endif;?><?php endif;?> value="3">Транспортом</option>


	</select>
</p>



<p class="wide-label">
	<span>Стоимость аренды:</span>
	<input type="text" name="AddObjectForm[price]" value="<?php if (isset($_POST['AddObjectForm']['price'])): ?><?php echo $_POST['AddObjectForm']['price'] ?><?php endif;?>" />
</p>



<p class="wide-label">
	<span>Общая площадь:</span>
	<input class="short-input" type="text" name="AddObjectForm[area_full]" value="<?php if (isset($_POST['AddObjectForm']['area_full'])): ?><?php echo $_POST['AddObjectForm']['area_full'] ?><?php endif;?>"/>
</p>

<p class="wide-label">
	<span>Жилая площадь:</span>
	<input class="short-input" type="text" name="AddObjectForm[area_live]" value="<?php if (isset($_POST['AddObjectForm']['area_live'])): ?><?php echo $_POST['AddObjectForm']['area_live'] ?><?php endif;?>"/>
</p>

<p class="wide-label">
	<span>Площадь кухни:</span>
	<input class="short-input" type="text" name="AddObjectForm[area_kitchen]" value="<?php if (isset($_POST['AddObjectForm']['area_kitchen'])): ?><?php echo $_POST['AddObjectForm']['area_kitchen'] ?><?php endif;?>"/>
</p>



<p class="wide-label">
	<span>Имя собственника:</span>
	<input class="wide-input" type="text" name="AddObjectForm[user]" value="<?php if (isset($_POST['AddObjectForm']['user'])): ?><?php echo $_POST['AddObjectForm']['user'] ?><?php endif;?>" />
</p>


<p class="wide-label">
	<span>Телефон собственника:</span>
	<input type="text" class="phone" name="AddObjectForm[phone]" value="<?php if (isset($_POST['AddObjectForm']['phone'])): ?><?php echo $_POST['AddObjectForm']['phone'] ?><?php endif;?>" />
</p>


<p class="wide-label">
	<span>Ваш номер телефона:</span>
	<input type="text" class="phone" name="AddObjectForm[phone_my]" value="<?php if (isset($_POST['AddObjectForm']['phone_my'])): ?><?php echo $_POST['AddObjectForm']['phone_my'] ?><?php endif;?>" />
	<span style="font: italic 17px/20px 'PT Sans'; float: right; width: 400px; text-align: left; margin-right: 0px;">Если вы собственник — не заполняется.<br/> На этот номер придет пароль для открытия 5-ти контактов.</span>
</p>

<p class="wide-label">
	<span>Ваш email:</span>
	<input type="text" name="AddObjectForm[email]" value="<?php if (isset($_POST['AddObjectForm']['email'])): ?><?php echo $_POST['AddObjectForm']['email'] ?><?php endif;?>" />
</p>

 <script type="text/javascript" src="/js/jquery.maskedinput.js" ></script>
<script type="text/javascript">
    $('document').ready(function() {
        $(".phone").mask('(999)999-99-99');
    })
</script>




<p class="wide-label">
	<span>Этаж:</span>
	<input class="short-input" name="AddObjectForm[floor]" type="text" value="<?php if (isset($_POST['AddObjectForm']['floor'])): ?><?php echo $_POST['AddObjectForm']['floor'] ?><?php endif;?>" />
</p>

<p class="wide-label">
	<span>Всего этажей:</span>
	<input class="short-input" name="AddObjectForm[floor_max]" type="text" value="<?php if (isset($_POST['AddObjectForm']['floor_max'])): ?><?php echo $_POST['AddObjectForm']['floor_max'] ?><?php endif;?>" />
</p>






<p class="wide-label">
	<span style="float: left;">Наличие удобств:</span>
	<fieldset class="what-property">
            <input <?php if (isset($_POST['AddObjectForm']['frige'])): ?><?php if ($_POST['AddObjectForm']['frige'] == 1) : ?> checked="checked" <?php endif;?><?php endif;?> type="checkbox" name="AddObjectForm[frige]" value="1" id="ra1">
		<label for="ra1"><span>холодильник</span></label>
		
		<input <?php if (isset($_POST['AddObjectForm']['furniture'])): ?><?php if ($_POST['AddObjectForm']['furniture'] == 1) : ?> checked="checked" <?php endif;?><?php endif;?> type="checkbox" name="AddObjectForm[furniture]" value="1" id="ra2">
		<label for="ra2"><span>мебель</span></label>
		
		<input <?php if (isset($_POST['AddObjectForm']['washer'])): ?><?php if ($_POST['AddObjectForm']['washer'] == 1) : ?> checked="checked" <?php endif;?><?php endif;?> type="checkbox" name="AddObjectForm[washer]" value="1" id="ra3">
		<label for="ra3"><span>стиральная машина</span></label>
	
		<input <?php if (isset($_POST['AddObjectForm']['net'])): ?><?php if ($_POST['AddObjectForm']['net'] == 1) : ?> checked="checked" <?php endif;?><?php endif;?> type="checkbox" name="AddObjectForm[net]" value="1" id="ra4">
		<label for="ra4"><span>интернет</span></label>
	</fieldset>
</p>

<p class="wide-label">
	<span>Загрузка фото:</span>
        <input style="margin-left: -15px; border: none; background:white; width:300px;" type="file" name="AddObjectForm[photoes][]" multiple="multiple"/>
</p>

<?php /*
<p class="wide-label">
	<span>Расскажите о себе:</span>
	<textarea name="AddObjectForm[about_me]"><?php if (isset($_POST['AddObjectForm']['about_me'])): ?><?php echo $_POST['AddObjectForm']['about_me'] ?><?php endif;?></textarea>
</p>
*/?>


<p class="wide-label">
	<span>Расскажите об объекте:</span>
	<textarea name="AddObjectForm[about_object]"><?php if (isset($_POST['AddObjectForm']['about_object'])): ?><?php echo $_POST['AddObjectForm']['about_object'] ?><?php endif;?></textarea>
</p>

<p><label style='background-color: white;' class="wide-label"><span style='background-color: white;'>Введите код с картинки:</span>
<?php echo CHtml::activeTextField($model,'verifyCode'); ?>
<?php  $this->widget('CCaptcha',array('showRefreshButton'=>false, 'clickableImage'=>true , 'imageOptions'=>array('style'=>'border:none; background-color:#99FFCC;  vertical-align: middle;', 'height'=>'40px', 'alt'=>'Картинка с кодом валидации', 'title'=>'Чтобы обновить картинку, нажмите по ней'))); ?> 

<p>
<?php echo CHtml::submitButton('Добавить обект');?>
</p>


<?php echo CHtml::hiddenField('add_object', '1');?>
<!--  <input type="hidden" name="subscribe" value="1"> -->
<?php echo CHtml::endForm();?>


</div>
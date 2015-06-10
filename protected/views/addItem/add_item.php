<script>
$('#main-search').empty();
</script>
<style>


.wide-label {line-height: 60px;}
.wide-label span {width: 270px; display: inline-block; text-align: right; margin-right: 30px;}

input {border: 1px solid #BCBCBC; font: 18px/30px "PT Sans"; height: 45px; border-radius: 4px; padding: 0px 10px; box-sizing: border-box; margin-left: -4px; display: inline-block;}

.short-input {width: 50px; text-align: center;}
.wide-input {width: 400px;}

input[type="radio"] {display: none; }
input[type="radio"] + label {display: block; float: left; line-height: 42px; padding: 0px 20px 0px 20px; border: 1px solid #BCBCBC; box-sizing: border-box; border-left: none; cursor: pointer; margin: 8px 0px; }
input[type="radio"] + label:nth-of-type(1){border-left: 1px solid #BCBCBC; border-radius: 4px 0px 0px 4px; }
label:last-child {border-right: 1px solid #BCBCBC; border-radius: 0px 4px 4px 0px; }
input[type="radio"]:checked + label {background: rgba(0, 0, 0, 0.07); box-shadow: inset 0px 1px 5px 0px rgba(0, 0, 0, 0.50); } 


select {height: 44px; font: 18px/30px "PT Sans"; padding: 0px 20px 0px 20px; border: 1px solid #BCBCBC; box-sizing: border-box; margin: 0px; margin-left: -4px; background: white; }


input[type="checkbox"] {display: none;}
input[type="checkbox"] + label {display: block; float: left; line-height: 42px; padding: 0px 20px 0px 20px; border: 1px solid #BCBCBC; border-left: none; cursor: pointer; margin: 8px 0px;}
input[type="checkbox"] + label:nth-of-type(1){border-left: 1px solid #BCBCBC; border-radius: 4px 0px 0px 4px;}
label:last-child {border-right: 1px solid #BCBCBC; border-radius: 0px 4px 4px 0px;}
input[type="checkbox"]:checked + label {background: rgba(0, 0, 0, 0.07); box-shadow: inset 0px 1px 5px 0px rgba(0, 0, 0, 0.50);}


textarea {vertical-align: top; margin-top: 8px; margin-bottom: 8px; border: none; border: 1px solid #BCBCBC; font: 18px/30px "PT Sans"; min-height: 134px; min-width: 400px; padding: 0px 10px; border-radius: 4px; box-sizing: border-box; margin-left: -4px; }


.break-line {border-bottom: 1px solid #BCBCBC; box-sizing: border-box; line-height: 29px; color: #BCBCBC; margin-bottom: 30px; }

input[type="submit"] {margin-top: 8px; margin-left: 300px; margin-bottom: 30px; background: #4579A6; color: white; border: none; padding: 0px 20px 0px 20px; cursor: pointer; }


</style>

<div class="wrapper">




<h1>Добавление нового<br> объекта в базу</h1>
<p class="subheader">процедура занимает около 5 минут</p>
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
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '1') : ?> selected="selected" <?php endif;?><?php endif;?> value="1">1 комнотна</option>
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '2') : ?> selected="selected" <?php endif;?><?php endif;?> value="2">2 комнотна</option>
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '3') : ?> selected="selected" <?php endif;?><?php endif;?> value="3">3 комнотна</option>
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '4') : ?> selected="selected" <?php endif;?><?php endif;?> value="4">4 комнотна</option>
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '5') : ?> selected="selected" <?php endif;?><?php endif;?> value="5">5 комнотна</option>
            <option <?php if (isset($_POST['AddObjectForm']['flat'])): ?><?php if ($_POST['AddObjectForm']['flat'] == '6') : ?> selected="selected" <?php endif;?><?php endif;?> value="6">много комнотна</option>
                
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
                    <option <?php if (isset($_POST['AddObjectForm']['district'])): ?><?php if ($_POST['AddObjectForm']['district'] == $d->id) : ?> selected="selected" <?php endif;?><?php endif;?> value="<?php echo $d->id ?>"><?php echo $d->name?></option>
                <?php endforeach;?>
		
	</select>
	
</p>

<p class="wide-label">
	<span>Улица:</span>
        <select name="AddObjectForm[street]">
                <?php foreach ($street as $s): ?>
                    <?php if ($s->truename) : ?><option <?php if (isset($_POST['AddObjectForm']['street'])): ?><?php if ($_POST['AddObjectForm']['street'] == $s->id) : ?> selected="selected" <?php endif;?><?php endif;?> value="<?php echo $s->id ?>"><?php echo $s->truename?></option><?php endif;?>
                <?php endforeach;?>
		
	</select>
	
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
<script type="text/javascript" src="/js/jquery.maskedinput.min.js"></script>
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
        <input style="border: none" type="file" name="AddObjectForm[photoes][]" multiple="multiple"/>
</p>

<p class="wide-label">
	<span>Расскажите о себе:</span>
	<textarea name="AddObjectForm[about_me]"><?php if (isset($_POST['AddObjectForm']['about_me'])): ?><?php echo $_POST['AddObjectForm']['about_me'] ?><?php endif;?></textarea>
</p>


<?php  $this->widget('CCaptcha'); ?> 
<?php echo CHtml::activeTextField($model,'verifyCode'); ?>

<p>
<?php echo CHtml::submitButton('Добавить обект');?>
</p>


<?php echo CHtml::hiddenField('add_object', '1');?>
<!--  <input type="hidden" name="subscribe" value="1"> -->
<?php echo CHtml::endForm();?>



</div>
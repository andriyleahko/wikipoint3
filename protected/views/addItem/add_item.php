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
<?php echo CHtml::beginForm();?>
<?php echo CHtml::errorSummary($model,null,null,array('style'=>'color:red'));?>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div style="color: blue;" class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<p class="wide-label">
	<span style="float: left;">Сдаётся:</span>
	<fieldset class="">
                <input onchange="selectRoomFlat(this); return false;" checked="checked" type="radio" name="AddObjectForm[room_flat]" id="flat" checked>
		<label for="flat"><span>квартира</span></label>
		
		<input onchange="selectRoomFlat(this); return false;" type="radio" name="AddObjectForm[room_flat]" id="room">
		<label for="room"><span>комната</span></label>
	</fieldset>
</p>



<p class="wide-label">
	<span>Количество комнат:</span>
	<select id="sel-flat" data-type="flat" name="AddObjectForm[flat]">
            <option selected="selected" value="1">1 комнотна</option>
            <option value="2">2 комнотна</option>
            <option value="3">3 комнотна</option>
            <option value="4">4 комнотна</option>
            <option value="5">5 комнотна</option>
            <option value="6">много комнотна</option>
                
	</select>
	<select id="sel-room" style="display:none" data-type="room" name="AddObjectForm[room]">
            <option selected="selected" value="7">1(2)ккв</option>
            <option value="8">1(3)ккв</option>
            <option value="9">1(4)ккв</option>
            <option value="10">1(5)ккв</option>
            <option value="11">1(мн)ккв</option>
            <option value="12">2(3)ккв</option>
            <option value="13">2(4)ккв</option>
            <option value="14">2(5)ккв</option>
            <option value="15">2(мн)ккв</option>
                
	</select>
</p>



<p class="wide-label">
	<span  class="wide-label">Адрес:</span>
	<input class="wide-input" type="text" name="AddObjectForm[address]" />
</p>




<p  class="wide-label">
	<span>Метро:</span>
	<select name="AddObjectForm[metro]">
                <?php foreach ($metro as $m): ?>
                    <option value="<?php echo $m->id?>"><?php echo $m->name?></option>
                <?php endforeach;?>
		
	</select>
</p>
<p  class="wide-label">
	<span>Время до метро (мин.):</span>
	<input class="wide-input" name="AddObjectForm[time_to_metro]" type="text"/>
</p>



<p class="wide-label">
	<span>Стоимость аренды:</span>
	<input type="text" name="AddObjectForm[price]" />
</p>



<p class="wide-label">
	<span>Общая площадь:</span>
	<input class="short-input" type="text" name="AddObjectForm[area_full]" />
</p>

<p class="wide-label">
	<span>Жилая площадь:</span>
	<input class="short-input" type="text" name="AddObjectForm[area_live]" />
</p>

<p class="wide-label">
	<span>Площадь кухни:</span>
	<input class="short-input" type="text" name="AddObjectForm[area_kitchen]" />
</p>



<p class="wide-label">
	<span>Имя собственника:</span>
	<input class="wide-input" type="text" name="AddObjectForm[user]" />
</p>


<p class="wide-label">
	<span>Телефон собственника:</span>
	<input type="text" name="phone" />
</p>


<p class="wide-label">
	<span>Ваш номер телефона:</span>
	<input type="text" name="AddObjectForm[phone_my]" />
	<span style="font: italic 17px/20px 'PT Sans'; float: right; width: 400px; text-align: left; margin-right: 0px;">Если вы собственник — не заполняется.<br/> На этот номер придет пароль для открытия 5-ти контактов.</span>
</p>




<p class="wide-label">
	<span>Этаж:</span>
	<input class="short-input" name="AddObjectForm[floor]" type="text">
</p>

<p class="wide-label">
	<span>Всего этажей:</span>
	<input class="short-input" name="AddObjectForm[floor_max]" type="text">
</p>






<p class="wide-label">
	<span style="float: left;">Наличие удобств:</span>
	<fieldset class="what-property">
            <input type="checkbox" name="AddObjectForm[frige]" value="1" id="ra1">
		<label for="ra1"><span>холодильник</span></label>
		
		<input type="checkbox" name="AddObjectForm[furniture]" value="1" id="ra2">
		<label for="ra2"><span>мебель</span></label>
		
		<input type="checkbox" name="AddObjectForm[washer]" value="1" id="ra3">
		<label for="ra3"><span>стиральная машина</span></label>
	
		<input type="checkbox" name="AddObjectForm[net]" value="1" id="ra4">
		<label for="ra4"><span>интернет</span></label>
	</fieldset>
</p>



<p class="wide-label">
	<span>Расскажите о себе:</span>
	<textarea name="AddObjectForm[about_me]"></textarea>
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
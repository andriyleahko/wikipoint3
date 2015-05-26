<div id="subscribe">

<h1>Подписка на рассылку<br/> новых объектов</h1>


<p class="subheader">под ваши запросы</p>



<?php echo CHtml::beginForm();?>
<?php echo CHtml::errorSummary($model,null,null,array('style'=>'color:red'));?>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div style="color: blue;" class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<p>
	<label class="wide">
		<span style="float: left;">Что вы ищете?</span>
		<fieldset class="what-property">
			<input type="radio" name="Baza812Subscribe[rooms-amount][]" value="7,8,9,10,11,12,13,14,15" id="ra1" <?php echo(!isset($model->rooms_amount)||$model->rooms_amount=='7,8,9,10,11,12,13,14,15')?'checked':'';?>>
			<label for="ra1"><span>комнату</span></label>
			
			<input type="radio" value="1" name="Baza812Subscribe[rooms-amount][]" id="ra2" <?php echo($model->rooms_amount=='1')?'checked':'';?>>
			<label for="ra2"><span>1 комн.</span></label>
			
			<input type="radio" value="2" name="Baza812Subscribe[rooms-amount][]" id="ra3" <?php echo($model->rooms_amount=='2')?'checked':'';?>>
			<label for="ra3"><span>2 комн.</span></label>
		
			<input type="radio" value="3" name="Baza812Subscribe[rooms-amount][]"  id="ra4" <?php echo($model->rooms_amount=='3')?'checked':'';?>>
			<label for="ra4"><span>3 комн.</span></label>
		
			<input type="radio" value="4,5,6" name="Baza812Subscribe[rooms-amount][]" id="ra5" <?php echo($model->rooms_amount=='4,5,6')?'checked':'';?>>
			<label for="ra5"><span>4 и более комн.</span></label>
		</fieldset>
</p>




<p>
	<label class="wide">
		<span>Рассчитываю снять на сумму до:</span>
		<select name="Baza812Subscribe[price_max]">
			<option value="15000" <?php echo($model->price_max==15000)?'selected':'';?>>15 000</option>
			<option value="20000" <?php echo(!isset($model->price_max)||$model->price_max==20000)?'selected':'';?>>20 000</option>
			<option value="25000" <?php echo($model->price_max==25000)?'selected':'';?>>25 000</option>
			<option value="30000" <?php echo($model->price_max==30000)?'selected':'';?>>30 000</option>
			<option value="35000" <?php echo($model->price_max==35000)?'selected':'';?>>35 000</option>
			<option value="40000" <?php echo($model->price_max==40000)?'selected':'';?>>40 000</option>
			<option value="45000" <?php echo($model->price_max==45000)?'selected':'';?>>45 000</option>
			<option value="50000" <?php echo($model->price_max==50000)?'selected':'';?>>50 000</option>
		</select>
	</label>
</p>


<p>
    <label class="wide">
        <span>Подходящие станции метро:</span>
        <?php 
            $metroArr = array();
            if (isset($metroName) && !empty($metroName)) {
                $metroArr = explode(',', $metroName);
            }
        ?>
	<a style="float: none" class="select-metro choose-metro"><?php if (count($metroArr)) : ?> Выбрано <?php echo count($metroArr) ?> станций <?php else : ?>Выбрать станции<?php endif; ?></a>
	<input type="hidden" id="metro-field" name="Baza812Subscribe[metro]" value="<?php echo(isset($metroName)&&$metroName)?$metroName:'';?>">
       
	<span class="extra-span"></span>
    </label>
</p>



<p class="break-line">&nbsp;</p>


<p><label class="wide"><span>Ваше имя*:</span><input required type="text" name='Baza812Subscribe[subscriber_name]' value="<?php echo $model->subscriber_name;?>"></label></p>
<p><label class="wide"><span>Телефон*:</span><input required type="text" name='Baza812Subscribe[subscriber_phone]' value="<?php echo $model->subscriber_phone;?>"></label><span class="extra-span"></span></p>
<p><label class="wide"><span>Электронная почта*:</span><input required  type="text"  name='Baza812Subscribe[subscriber_email]' value="<?php echo $model->subscriber_email;?>"></label></p>




<p>
	<label class="wide">
		<span>Кто будет проживать:</span>
		<select name="Baza812Subscribe[people]">
			<option value="" selected>Выберите</option>
			<option value="Семейная пара" <?php echo($model->people=='Семейная пара')?'selected':'';?>>Семейная пара</option>
			<option value="Одна девушка" <?php echo($model->people=='Одна девушка')?'selected':'';?>>Одна девушка</option>
			<option value="Один мужчина" <?php echo($model->people=='Один мужчина')?'selected':'';?>>Один мужчина</option>
			<option value="Две девушки" <?php echo($model->people=='Две девушки')?'selected':'';?>>Две девушки</option>
			<option value="Двое мужчин" <?php echo($model->people=='Двое мужчин')?'selected':'';?>>Двое мужчин</option>
			<option value="Две семейные пары" <?php echo($model->people=='Две семейные пары')?'selected':'';?>>Две семейные пары</option>
			<option value="Семейная пара и сосед(ка)" <?php echo($model->people=='Семейная пара и сосед(ка)')?'selected':'';?>>Семейная пара и сосед(ка)</option>
			<option value="другое" <?php echo($model->people=='другое')?'selected':'';?>>другое</option>
		</select>	
	</label>
</p>




<p>
	<label class="wide">
		<span style="float: left;">Домашние животные:</span>
		<fieldset class="what-property">
			<input type="radio" name="Baza812Subscribe[animals]" id="animals-no" value=2 <?php echo(!isset($model->animals)||$model->animals=='2')?'checked':'';?>>
			<label for="animals-no"><span>нет</span></label>
			
			<input type="radio" name="Baza812Subscribe[animals]" id="animals-yes" value=1 <?php echo($model->animals=='1')?'checked':'';?>>
			<label for="animals-yes"><span>есть</span></label>
		</fieldset>
</p>




<p>
	<label class="wide">
		<span style="float: left;">Дети до 7лет:</span>
		<fieldset class="what-property">
			<input type="radio" name="Baza812Subscribe[kids]" id="kids-no" value=2 <?php echo(!isset($model->kids)||$model->kids=='2')?'checked':'';?>>
			<label for="kids-no"><span>нет</span></label>
			
			<input type="radio" name="Baza812Subscribe[kids]" id="kids-yes" value=1 <?php echo($model->kids=='1')?'checked':'';?>>
			<label for="kids-yes"><span>есть</span></label>
		</fieldset>
</p>



<p><label class="wide"><span>Расскажите о себе:</span><textarea name='Baza812Subscribe[about_me]'><?php echo (isset($model->about_me)&&$model->about_me)?$model->about_me:'';?></textarea></p>
<p><label class="wide"><span>Присылать варианты за 50%:</span><input type="text" name='Baza812Subscribe[variant]' value="<?php echo (isset($model->variant)&&$model->variant)?$model->variant:'';?>"></label></p>


<p class="break-line">&nbsp;</p>

<?php  $this->widget('CCaptcha'); ?> <br>
<?php echo CHtml::activeTextField($model,'verifyCode'); ?>



<p>
<?php echo CHtml::submitButton('Подписаться на рассылку');?>
</p>


<?php echo CHtml::hiddenField('subscribe', '1');?>
<!--  <input type="hidden" name="subscribe" value="1"> -->
<?php echo CHtml::endForm();?>



</div>
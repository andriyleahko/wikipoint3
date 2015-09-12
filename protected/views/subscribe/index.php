<div id="search-results">




</div>

<div id="subscribe">

<h1 style='color: #4579a6;
    font: 700 48px/60px "Fira Sans";
    text-align: center;
    background:white; width:960px; margin-left:-10px;'>Подписка на рассылку<br/> новых объектов</h1>


<p class="subheader" style='margin-bottom:-40px; padding-bottom:65px;'><span class='sh'>самые свежие объявления с доставкой</span></p>

<div style='background: white; width:960px; margin-left:-10px;'>

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
			<label for="ra1"><span>Комнату</span></label>
			
			<input type="radio" value="1" name="Baza812Subscribe[rooms-amount][]" id="ra2" <?php echo($model->rooms_amount=='1')?'checked':'';?>>
			<label for="ra2"><span>1 ККВ</span></label>
			
			<input type="radio" value="2" name="Baza812Subscribe[rooms-amount][]" id="ra3" <?php echo($model->rooms_amount=='2')?'checked':'';?>>
			<label for="ra3"><span>2 ККВ</span></label>
		
			<input type="radio" value="3" name="Baza812Subscribe[rooms-amount][]"  id="ra4" <?php echo($model->rooms_amount=='3')?'checked':'';?>>
			<label for="ra4"><span>3 ККВ</span></label>
		
			<input type="radio" value="4,5,6" name="Baza812Subscribe[rooms-amount][]" id="ra5" <?php echo($model->rooms_amount=='4,5,6')?'checked':'';?>>
			<label for="ra5"><span>4 ККВ и более</span></label>
		</fieldset>
</p>




<p>
	<label class="wide">
		<span>Рассчитываю снять на сумму до:</span>
		<input style='margin-left: -5px;' type="text" maxlength="10" name='Baza812Subscribe[price_max]' value="<?php echo $model->price_max;?>">		
		<?php /*
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
		*/?>
		
	</label>
</p>


<p>
    <label class="wide">
        <span>Подходящие станции метро:</span>
	<a style="float: none" class="select-metro choose-metro">Выбрать станции</a>
	<input type="hidden" id="metro-field" name="Baza812Subscribe[metro]" value="">
	<input id="dictrict-field" type="hidden" value="" name="Baza812Subscribe[dictrict]">
       
	<span class="extra-span"></span>
    </label>
</p>




<p><label class="wide"><span>Ваше имя*:</span><input required type="text" name='Baza812Subscribe[subscriber_name]' value="<?php echo $model->subscriber_name;?>"></label></p>
<p><label class="wide"><span>Телефон*:</span><input class="phone" required type="text" name='Baza812Subscribe[subscriber_phone]' value="<?php echo $model->subscriber_phone;?>"></label><span class="extra-span"></span></p>
<p><label class="wide"><span>Электронная почта*:</span><input required  type="text"  name='Baza812Subscribe[subscriber_email]' value="<?php echo $model->subscriber_email;?>"></label></p>
<script type="text/javascript" src="/js/jquery.maskedinput.js" ></script>
<script type="text/javascript">
    $('document').ready(function() {
        $(".phone").mask('(999)999-99-99');
    })
</script>

<input type="hidden" name="Baza812Subscribe[kids]" id="kids-yes" value=1> 
<input type="hidden" name="Baza812Subscribe[animals]" id="animals-yes" value=1>
<?php /*
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
*/?>


<p><label class="wide"><span>Введите код с картинки:</span>

<span id='spa-m'  style='margin-left: -55px;'><?php echo CHtml::activeTextField($model,'verifyCode'); ?></span>
<?php  $this->widget('CCaptcha',array('showRefreshButton'=>false, 'clickableImage'=>true , 'imageOptions'=>array('style'=>'border:none; background-color:#99FFCC;  vertical-align: middle;', 'height'=>'40px', 'alt'=>'Картинка с кодом валидации', 'title'=>'Чтобы обновить картинку, нажмите по ней'))); ?> 

</p>


<p>
<?php echo CHtml::submitButton('Подписаться на рассылку');?>
</p>


<?php echo CHtml::hiddenField('subscribe', '1');?>
<!--  <input type="hidden" name="subscribe" value="1"> -->
<?php echo CHtml::endForm();?>


</div>

</div>

<script type="text/javascript">
function browserDetectNav(chrAfterPoint)
{
var
    UA=window.navigator.userAgent,       // содержит переданный браузером юзерагент
    //--------------------------------------------------------------------------------
	OperaB = /Opera[ \/]+\w+\.\w+/i,     //
	OperaV = /Version[ \/]+\w+\.\w+/i,   //	
	FirefoxB = /Firefox\/\w+\.\w+/i,     // шаблоны для распарсивания юзерагента
	ChromeB = /Chrome\/\w+\.\w+/i,       //
	SafariB = /Version\/\w+\.\w+/i,      //
	IEB = /MSIE *\d+\.\w+/i,             //
	SafariV = /Safari\/\w+\.\w+/i,       //
        //--------------------------------------------------------------------------------
	browser = new Array(),               //массив с данными о браузере
	browserSplit = /[ \/\.]/i,           //шаблон для разбивки данных о браузере из строки
	OperaV = UA.match(OperaV),
	Firefox = UA.match(FirefoxB),
	Chrome = UA.match(ChromeB),
	Safari = UA.match(SafariB),
	SafariV = UA.match(SafariV),
	IE = UA.match(IEB),
	Opera = UA.match(OperaB);
		
		//----- Opera ----
		if ((!Opera=="")&(!OperaV=="")) browser[0]=OperaV[0].replace(/Version/, "Opera")
				else 
					if (!Opera=="")	browser[0]=Opera[0]
						else
							//----- IE -----
							if (!IE=="") browser[0] = IE[0]
								else 
									//----- Firefox ----
									if (!Firefox=="") browser[0]=Firefox[0]
										else
											//----- Chrom ----
											if (!Chrome=="") browser[0] = Chrome[0]
												else
													//----- Safari ----
													if ((!Safari=="")&&(!SafariV=="")) browser[0] = Safari[0].replace("Version", "Safari");
//------------ Разбивка версии -----------

	var
            outputData;                                      // возвращаемый функцией массив значений
                                                             // [0] - имя браузера, [1] - целая часть версии
                                                             // [2] - дробная часть версии
	if (browser[0] != null) outputData = browser[0].split(browserSplit);
	if ((chrAfterPoint==null)&&(outputData != null)) 
		{
			chrAfterPoint=outputData[2].length;
			outputData[2] = outputData[2].substring(0, chrAfterPoint); // берем нужное ко-во знаков
			return(outputData);
		}
			else return(false);
}




data = browserDetectNav();      //вызываем функцию, параметр НЕ передаем,



if(data[0]=='Firefox'){
	$('#spa-m').css('margin-left','-30px');
};
</script>
	  

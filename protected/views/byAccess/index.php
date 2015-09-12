
<style>

#payment-methods .sidenote {color: #979797; font: 14px/60px "Fira Sans";}

#payment-methods hr {
    border: none;
    height: 1px;
    color: #D8D8D8;
    background-color: #D8D8D8;
}

#payment-methods h3 {margin-bottom: 0px; font: 700 20px/60px "Fira Sans";}

#payment-methods .phone {
	height: 44px;
	margin: 8px 0px;
	border: 1px solid #BCBCBC;
	border-radius: 4px;
	font: 600 20px/30px "Fira Sans";
	padding: 0px 15px;
	text-align:center
	
}

#payment-methods h3 {margin-top: 30px; text-align: center;}

#submit:hover{
box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

#pr {
	float: right;
    font: 700 30px/60px "Fira Sans";
    margin-right: 260px;
    color: #393939;
}

</style>


<div id="payment-methods">


<?php echo CHtml::beginForm('/byAccess/buy', 'post'); ?>


<h1 style='color: #4579a6; font: 700 48px/60px "Fira Sans";  text-align: center;'>Покупка пароля к базе</h1>
<p class="subheader"><span class="sh">для доступа к контактам владельцев</span></p>

<h3>1. Выберите ТАРИФ</h3>
<div style='text-align: center;margin-left: 115px;'>
<fieldset class="radio-box">
	<?php $i=1; foreach ($model as $mod):?>
	<input type="radio" value="<?php echo $mod->id;?>" name="tarif" id="t<?php echo $i;?>" <?php echo ($_POST['tarif']==$mod->id)?'checked':'';?>>
	<label for="t<?php echo $i?>"><span><?php echo $mod->name?></span></label> 
	<input id="p<?php echo $i?>" type='hidden' value="<?php echo $mod->price;?>">
	<?php $i++; endforeach;?>
	<br/>
	<div style='margin-left: 255px; margin-top:20px; position: absolute;'>
		<span id='pr'></span>		
	</div>
</fieldset>
</div>
<?php echo (isset($not_tarif)&$not_tarif!='')?'<p style="color:red">'.$not_tarif.'</p>':'';?>

<h3>2. Способ платы - без комиссии</h3>

<h3>3. Ваш номер телефона</h3>

<div style='text-align: center;'>
	<input class="phone" type="text" name='phone' value="<?php echo ($_POST['phone'])?$_POST['phone']:'';?>">	
	<?php echo (isset($not_phone)&$not_phone!='')?'<p style="color:red">'.$not_phone.'</p>':'';?>
	<p class="sidenote">На этот номер будет отправлен пароль доступа к базе.</p>
</div>


<script type="text/javascript">
    $('document').ready(function() {
        $(".phone").mask('(999)999-99-99');
    	$('#t1').on('change', function () {
        	$('#r').css('display','block');
    		$('#pr').text($('#p1').val()+' рублей');
    		$('#pr').html()
    		});
    	$('#t2').on('change', function () {
    		$('#r').css('display','block');
    		$('#pr').text($('#p2').val()+' рублей');
    		});
    	$('#t3').on('change', function () {
    		$('#r').css('display','block');
    		$('#pr').text($('#p3').val()+' рублей');
    		});
    })
</script>

<div style='text-align: center;'>
	<input type="submit" id='submit' value="Перейти к оплате">
</div>

<?php echo CHtml::endForm();?>

<div style='text-align: center; margin-top: -25px;'>
	<p class="sidenote">Обычно сообщение с паролем приходит за 10 минут.</p>
</div>


</div>


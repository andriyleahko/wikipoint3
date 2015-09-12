
<style>

#payment-methods .sidenote {color: #979797; font-style: italic;}

#payment-methods hr {
    border: none;
    height: 1px;
    color: #D8D8D8;
    background-color: #D8D8D8;
}

#payment-methods h3 {margin-bottom: 0px; font: 700 24px/60px "PT Sans";}

#payment-methods .phone {
	height: 44px;
	margin: 8px 0px;
	border: 1px solid #BCBCBC;
	border-radius: 4px;
	font: 700 24px/30px "PT Sans";
	padding: 0px 15px;
	text-align:center
	
}

#payment-methods h3 {margin-top: 30px;}

#submit:hover{
box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

#pr {
	float: right;
    font: 700 27px/60px "PT Sans";
    margin-right: 260px;
    color: #393939;
}

</style>


<div id="payment-methods">


<?php echo CHtml::beginForm('/byAccess/buy', 'post'); ?>


<h1 style='color: #4579a6; font: 700 48px/60px "PT Sans";  text-align: center;'>Покупка пароля к базе</h1>
<p class="subheader">для доступа к контактам владельцев</p>

<h3>1. Тариф</h3>

<fieldset class="radio-box">
	<?php $i=1; foreach ($model as $mod):?>
	<input type="radio" value="<?php echo $mod->id;?>" name="tarif" id="t<?php echo $i;?>" <?php echo ($_POST['tarif']==$mod->id)?'checked':'';?>>
	<label for="t<?php echo $i?>"><span><?php echo $mod->name?></span></label> 
	<input id="p<?php echo $i?>" type='hidden' value="<?php echo $mod->price;?>">
	<?php $i++; endforeach;?>
	<div style='  margin-left: 640px; position: absolute;'>
	<span id='pr'></span><span><img id='r' style='float:right; margin-right:-80px; margin-top:20px; display:none;' src='/img/p-buy.png'></span>
	</div>
</fieldset>
<?php echo (isset($not_tarif)&$not_tarif!='')?'<p style="color:red">'.$not_tarif.'</p>':'';?>

<h3>2. Способ платы - без комиссии</h3>


<h3>3. Ваш номер телефона</h3>

<p>На этот номер будет отправлен пароль доступа к базе.</p>
<input class="phone" type="text" name='phone' value="<?php echo ($_POST['phone'])?$_POST['phone']:'';?>">	
<?php echo (isset($not_phone)&$not_phone!='')?'<p style="color:red">'.$not_phone.'</p>':'';?>

<script type="text/javascript">
    $('document').ready(function() {
        $(".phone").mask('(999)999-99-99');
    	$('#t1').on('change', function () {
        	$('#r').css('display','block');
    		$('#pr').text($('#p1').val());
    		$('#pr').html()
    		});
    	$('#t2').on('change', function () {
    		$('#r').css('display','block');
    		$('#pr').text($('#p2').val());
    		});
    	$('#t3').on('change', function () {
    		$('#r').css('display','block');
    		$('#pr').text($('#p3').val());
    		});
    })
</script>

<p class="break-line">&nbsp;</p>

<input type="submit" id='submit' value="Перейти к оплате">


<?php echo CHtml::endForm();?>

<p class="sidenote">Обычно сообщение с паролем приходит за 10 минут.



</div>


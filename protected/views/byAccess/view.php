<h1>Статус оплаты</h1>

<p>
<?php echo ($ok=='ok')?'Вам открыт доступ':'Ошыбка. Обратитесь в службу поддержки'?>
</p>

<?php if ($ok=='ok'):?>
	<p> Доступ: <?php echo $model->Baza812TypePasword->name?></p>
	<p> Пароль: <?php echo $model->pasword?></p>
<?php endif;?>

<p>
<?php echo ($ok=='abort')?'Отменено пользователем или другая ошыбка':''?>
</p>
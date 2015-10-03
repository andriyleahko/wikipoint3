<h1>Статус оплаты</h1>

<?php
$fl=Yii::app()->user->getFlashes();
 if (isset($fl)&&count($fl)>0){
    foreach($fl as $key => $message) {
        echo '<p>' . $message . "</p>\n";
	}
	
 }
?>

<p>
<?php echo ($ok=='ok')?'Вам открыт доступ':''?>
</p>

<?php if ($ok=='ok'):?>
	<p> Доступ: <?php echo $model->Baza812TypePasword->name?></p>
	<p> Пароль: <?php echo $model->pasword?></p>
<?php endif;?>

<p>
<?php echo ($ok=='abort')?'Отменено пользователем или другая ошыбка':''?>
</p>
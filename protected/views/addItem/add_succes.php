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

.errorSummary li {font: 12px/20px "Fira Sans"; color:red; padding-left:10px;}
.errorSummary p {font: 18px/20px "Fira Sans"; color:red; padding-left:10px;}

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
<?php echo CHtml::errorSummary($model,null,null,array('style'=>''));?>
<?php
$fl=Yii::app()->user->getFlashes();
 if (isset($fl)&&count($fl)>0){
    foreach($fl as $key => $message) {
        echo '<div style="color: #4579a6; text-align: center;" class="flash-' . $key . '">' . $message . "</div>\n";
	}
	
 }
?>


<?php echo CHtml::hiddenField('add_object', '1');?>
<!--  <input type="hidden" name="subscribe" value="1"> -->
<?php echo CHtml::endForm();?>


</div>
<?php
	date_default_timezone_set('Europe/Moscow'); // ���� ������, �� ���� �� ���������� �� ���� ���....
	date_default_timezone_set('Europe/Kiev');
	
	
// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';


// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message//
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);

// for global functions
$globalFunctions=dirname(__FILE__).'/protected/globalfunctions.php';
require_once($globalFunctions);

Yii::createWebApplication($config)->run();

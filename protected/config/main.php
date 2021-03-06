<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'language'=>'ru',

	// preloading 'log' component
	'preload'=>array('log'),
    
        'defaultController' => 'main',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'111',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
			'robokassa' => array(
					'class' => 'application.components.yii-robokassa.Robokassa',
					'sMerchantLogin' => 'baza812',
					'sMerchantPass1' => 'baza812_123',
					'sMerchantPass2' => '123_baza812',
					'sCulture' => 'ru',
					'sIncCurrLabel' => '',
					//'orderModel' => 'InvoiceRobo', // ваша модель для выставления счетов
					//'priceField' => 'amount', // атрибут модели, где хранится сумма
					'isTest' => true, // тестовый либо боевой режим работы
			),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
			
		'paysto' => array(
				'class' => 'Paysto',
				'shop_id' => 22523,
				'secret_key' =>'95RNZ793k4kpjCL9V266Wf',
		),
		'smsc' => array(
				'class' => 'Smsc',
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                                'add-item' => 'AddItem/add',
                                //'vk-shared' => 'AddItem/add',
                                'get-access' => 'GetPassword/index',
                                'by-access' => 'ByAccess/index'
			),
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'imgDomain' => 'http://grandprime.info',
	),
);

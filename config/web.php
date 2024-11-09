<?php

use yii\helpers\ArrayHelper;

$commonConfig = require __DIR__ . '/common.php';

$config = [
    'id' => 'basic',
    'name' => 'ELStudio',
    'language' => 'ru-RU',
	'modules' => [
		'gridview' =>  [
			'class' => '\kartik\grid\Module',
		],
		'v1' => [
			'class' => 'app\modules\v1\Module',
		],
	],
    'components' => [
        'request' => [
            'cookieValidationKey' => '1CRqRexV0Jxo-DUliEvJIx6G8AEJ0l',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
	        'loginUrl' => '/security/login',
            'enableAutoLogin' => true,
        ],
	    'formatter' => [
		    'class' => 'yii\i18n\Formatter',
		    'nullDisplay' => '',
		    'thousandSeparator' => ' ',
		    'decimalSeparator' => '.',
		    'defaultTimeZone' => date_default_timezone_get(),
		    'dateFormat' => 'php:d.m.Y',
		    'datetimeFormat' => 'php:d.m.Y H:i',
		    'timeFormat' => 'php:H:i',
	    ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
	    'assetManager' => [
		    'converter' => [
			    'class' => 'yii\web\AssetConverter',
			    'commands' => [
				    'scss' => ['css', 'C:\Ruby22\bin\sass {from} {to}']
			    ],
		    ],
	    ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
				'login' => 'security/login',
	            'logout' => 'security/logout',
	            'registration' => 'security/registration',
                '<controller>/create' => '<controller>/create',
                '<controller>/<id:\d+>' => '<controller>/view',
                '<controller>/<id:\d+>/<action>' => '<controller>/<action>',
                '<controller>' => '<controller>/index',
            ],
        ],
    ],
	'on beforeRequest' => function ($event) {
		if (Yii::$app->user->isGuest) {
			if (Yii::$app->request->url != '/login' && Yii::$app->request->url != '/registration') {
				Yii::$app->response->redirect(['/login']);
			}
		}
	},
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return ArrayHelper::merge($commonConfig, $config);

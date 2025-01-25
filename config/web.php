<?php

$commonConfig = require __DIR__ . '/common.php';

$config = [
    'id' => 'basic',
    'name' => 'ELStudio',
	'bootstrap' => [
		//'assetsAutoCompress',
	],
	'modules' => [
		'gridview' =>  [
			'class' => kartik\grid\Module::class,
		],
		'v1' => [
			'class' => app\modules\v1\Module::class,
		],
	],
    'components' => [
        'request' => [
            'cookieValidationKey' => $_ENV['COOKIE_VALIDATION_KEY'],
        ],
        'user' => [
            'identityClass' => app\models\User::class,
	        'loginUrl' => '/security/login',
            'enableAutoLogin' => true,
        ],
	    'formatter' => [
		    'class' => yii\i18n\Formatter::class,
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
	    'assetManager' => [
		    'appendTimestamp' => true,
	    ],
	    'assetsAutoCompress' => [
		    'class' => skeeks\yii2\assetsAuto\AssetsAutoCompressComponent::class,
	    ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
				'/' => 'site/index',
				'login' => 'security/login',
	            'logout' => 'security/logout',
	            'registration' => 'security/registration',
	            'visit/<clientId:\d+>' => 'visit/index',
	            'visit/<clientId:\d+>/create' => 'visit/create',
                '<controller>/create' => '<controller>/create',
                '<controller>/<id:\d+>' => '<controller>/view',
                '<controller>/<id:\d+>/<action>' => '<controller>/<action>',
                '<controller>' => '<controller>/index',
            ],
        ],
    ],
	/*'on beforeRequest' => function ($event) {
		if (Yii::$app->user->isGuest) {
			if (Yii::$app->request->url != '/login' && Yii::$app->request->url != '/registration') {
				Yii::$app->response->redirect(['/login']);
			}
		}
	},*/
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => yii\debug\Module::class,
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'allowedIPs' => ['*'],
    ];
}

return yii\helpers\ArrayHelper::merge($commonConfig, $config);

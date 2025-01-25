<?php

$commonConfig = require __DIR__ . '/common.php';

$config = [
    'id' => 'basic-tests',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => [
			'dsn' => "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME_TEST']}",
        ],
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'user' => [
            'identityClass' => app\models\User::class,
	        'enableSession' => false,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
        ],
    ],
];

return yii\helpers\ArrayHelper::merge($commonConfig, $config);

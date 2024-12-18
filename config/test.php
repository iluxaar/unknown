<?php

use yii\helpers\ArrayHelper;

$params = require __DIR__ . '/params.php';
$commonConfig = require __DIR__ . '/common.php';
$db = require __DIR__ . '/test_db.php';

$config = [
    'id' => 'basic-tests',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => $db,
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'user' => [
            'identityClass' => 'app\models\User',
	        'enableSession' => false,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
            /*'csrfCookie' => [
                'domain' => 'localhost',
            ],*/
        ],
    ],
    'params' => $params,
];

return ArrayHelper::merge($commonConfig, $config);

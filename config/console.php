<?php

use yii\helpers\ArrayHelper;

$commonConfig = require __DIR__ . '/common.php';

$config = [
    'id' => 'basic-console',
    'bootstrap' => [
		'log',
	    'queue',
    ],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@tests' => '@app/tests',
    ],
	'controllerMap' => [
		'fixture' => [
			'class' => 'yii\faker\FixtureController',
		],
	],
];

return ArrayHelper::merge($commonConfig, $config);

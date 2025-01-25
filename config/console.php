<?php

$commonConfig = require __DIR__ . '/common.php';

$config = [
    'id' => 'basic-console',
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@tests' => '@app/tests',
    ],
	'controllerMap' => [
		'fixture' => [
			'class' => yii\faker\FixtureController::class,
		],
	],
];

return yii\helpers\ArrayHelper::merge($commonConfig, $config);

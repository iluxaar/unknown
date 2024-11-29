<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db-local.php';

$config = [
	'basePath' => dirname(__DIR__),
	'bootstrap' => [
		'log',
		'queue',
	],
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
	],
	'components' => [
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'log' => [
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'db' => $db,
		'queue' => [
			'class' => \yii\queue\db\Queue::class,
			'db' => 'db',
			'tableName' => '{{%queue}}',
			'channel' => 'default',
			'deleteReleased' => false,
			'mutex' => \yii\mutex\MysqlMutex::class,
			'as log' => \yii\queue\LogBehavior::class
		],
	],
	'params' => $params,
];

return $config;
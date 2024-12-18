<?php

use yii\swiftmailer\Mailer;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db-local.php';

$config = [
	'basePath' => dirname(__DIR__),
	'language' => 'ru-RU',
	'bootstrap' => [
		'log',
		'queue',
	],
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
	],
	'components' => [
		'db' => $db,
		'cache' => [
			'class' => 'yii\redis\Cache',
			'redis' => [
				'hostname' => 'redis',
				'port' => 6379,
				'database' => 0,
			]
		],
		'log' => [
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'mailer' => [
			'class' => Mailer::class,
			'useFileTransport' => true,
		],
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
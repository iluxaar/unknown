<?php

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

$params = require __DIR__ . '/params.php';

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
		'db' => [
			'class' => yii\db\Connection::class,
			'dsn' => "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",
			'username' => $_ENV['DB_USERNAME'],
			'password' => $_ENV['DB_PASSWORD'],
			'enableSchemaCache' => YII_ENV_PROD,
			'schemaCache' => 'cache',
			'charset' => 'utf8',
		],
		'cache' => [
			'class' => yii\redis\Cache::class,
			'redis' => [
				'hostname' => $_ENV['REDIS_HOST'],
				'port' => $_ENV['REDIS_PORT'],
				'database' => $_ENV['REDIS_DB'],
			]
		],
		'log' => [
			'targets' => [
				[
					'class' => yii\log\FileTarget::class,
					'levels' => ['error', 'warning'],
				],
			],
		],
		'mailer' => [
			'class' => yii\swiftmailer\Mailer::class,
			'useFileTransport' => !YII_ENV_PROD,
		],
		'queue' => [
			'class' => yii\queue\db\Queue::class,
			'db' => 'db',
			'tableName' => '{{%queue}}',
			'channel' => 'default',
			'deleteReleased' => false,
			'mutex' => yii\mutex\MysqlMutex::class,
			'as log' => yii\queue\LogBehavior::class
		],
	],
	'params' => $params,
];

return $config;
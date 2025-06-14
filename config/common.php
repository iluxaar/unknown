<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
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
			'enableSchemaCache' => true,
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
					'class' => yii\log\DbTarget::class,
					'levels' => ['error', 'warning'],
				],
				[
					'class' => yii\log\EmailTarget::class,
					'levels' => ['error'],
					'message' => [
						'from' => ['logger@unknown.lc'],
						'to' => ['admin@unknown.lc'],
						'subject' => 'Error at unknown.lc',
					],
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
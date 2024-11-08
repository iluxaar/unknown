<?php

namespace app\modules\v1\controllers;

use Yii;
use yii\web\Controller;

/**
 * Class SwaggerController
 * @package app\modules\v1\controllers
 */
class SwaggerController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public $layout = 'swagger';
	
	/**
	 * @return array[]
	 */
	public function actions()
	{
		return [
			'doc' => [
				'class' => 'light\swagger\SwaggerAction',
				'restUrl' => \yii\helpers\Url::to(['api'], true),
			],
			'api' => [
				'class' => 'light\swagger\SwaggerApiAction',
				'scanDir' => [
					Yii::getAlias('@app/modules/core'),
					Yii::getAlias('@app/modules/v1'),
				],
			],
		];
	}
	
}

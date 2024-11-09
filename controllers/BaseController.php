<?php

namespace app\controllers;

use app\actions\CreateAction;
use app\actions\DeleteAction;
use app\actions\ListAction;
use app\actions\UpdateAction;
use app\actions\ViewAction;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Class BaseController
 * @package app\controllers
 */
class BaseController extends Controller
{
	/**
	 * @var string
	 */
	public string $modelName;
	
	/**
	 * @var string
	 */
	public string $searchModelName;
	
	/**
	 * @var array
	 */
	public array $defaultValues = [];
	
	/**
	 * @return array
	 */
	public function behaviors(): array
	{
		return array_merge(
			parent::behaviors(),
			[
				'verbs' => [
					'class' => VerbFilter::className(),
					'actions' => [
						'delete' => ['POST'],
					],
				],
			]
		);
	}
	
	/**
	 * @return array[]
	 */
	public function actions(): array
	{
		return [
			'index' => [
				'class' => ListAction::class,
				'searchModelName' => $this->searchModelName,
			],
			'view' => [
				'class' => ViewAction::class,
				'modelName' => $this->modelName,
			],
			'create' => [
				'class' => CreateAction::class,
				'modelName' => $this->modelName,
				'defaultValues' => $this->defaultValues,
			],
			'update' => [
				'class' => UpdateAction::class,
				'modelName' => $this->modelName,
			],
			'delete' => [
				'class' => DeleteAction::class,
				'modelName' => $this->modelName,
			],
		];
	}
}
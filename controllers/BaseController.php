<?php

namespace app\controllers;

use app\actions\CreateAction;
use app\actions\DeleteAction;
use app\actions\ListAction;
use app\actions\UpdateAction;
use app\actions\ViewAction;
use app\traits\FindModelTrait;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Class BaseController
 * @package app\controllers
 *
 * @property-read string $modelName
 * @property-read string $searchModelName
 */
abstract class BaseController extends Controller
{
	use FindModelTrait;
	
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
					'class' => VerbFilter::class,
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
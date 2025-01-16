<?php

namespace app\controllers;

use app\actions\CreateAction;
use app\actions\DeleteAction;
use app\actions\ListAction;
use app\actions\UpdateAction;
use app\models\Client;
use app\search\ClientSearch;

/**
 * Class ClientController
 * @package app\controllers
 *
 * Управление клиентами
 */
class ClientController extends BaseController implements ControllerInterface
{
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
	
	/**
	 * @return string
	 */
	public function getModelName(): string
	{
		return Client::class;
	}
	
	/**
	 * @return string
	 */
	public function getSearchModelName(): string
	{
		return ClientSearch::class;
	}
}

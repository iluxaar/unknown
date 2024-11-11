<?php

namespace app\controllers;

use app\actions\CreateAction;
use app\form\UserForm;
use app\models\User;
use app\search\UserSearch;

/**
 * Class UserController
 * @package app\controllers
 */
class UserController extends BaseController implements ControllerInterface
{
	/**
	 * @return array[]
	 */
	public function actions(): array
	{
		return array_merge(parent::actions(), [
			'create' => [
				'class' => CreateAction::class,
				'modelName' => UserForm::class,
			],
		]);
	}
	
	/**
	 * @return string
	 */
	public function getModelName(): string
	{
		return User::class;
	}
	
	/**
	 * @return string
	 */
	public function getSearchModelName(): string
	{
		return UserSearch::class;
	}
	
}

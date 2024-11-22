<?php

namespace app\controllers;

use app\models\Visit;
use app\search\VisitSearch;

/**
 * VisitController implements the CRUD actions for Visit model.
 *
 * Записи клиентов
 */
class VisitController extends BaseController implements ControllerInterface
{
	/**
	 * @return void
	 */
	public function init(): void
	{
		$this->defaultValues = [
			'user_id' => \Yii::$app->user->id,
		];
		
		parent::init();
	}
	
	/**
	 * @return string
	 */
	public function getModelName(): string
	{
		return Visit::class;
	}
	
	/**
	 * @return string
	 */
	public function getSearchModelName(): string
	{
		return VisitSearch::class;
	}
}

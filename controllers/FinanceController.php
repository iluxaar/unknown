<?php

namespace app\controllers;

use app\models\Finance;
use app\search\FinanceSearch;
use Yii;

/**
 * Class FinanceController
 * @package app\controllers
 *
 * Управление финансами
 */
class FinanceController extends BaseController implements ControllerInterface
{
	/**
	 * @return void
	 */
	public function init(): void
	{
		$this->defaultValues = [
			'user_id' => Yii::$app->user->id,
		];
		
		parent::init();
	}
	
	/**
	 * @return string
	 */
	public function getModelName(): string
	{
		return Finance::class;
	}
	
	/**
	 * @return string
	 */
	public function getSearchModelName(): string
	{
		return FinanceSearch::class;
	}
}

<?php

namespace app\controllers;

use app\models\Finance;
use app\search\FinanceSearch;
use Yii;

/**
 * Class FinanceController
 * @package app\controllers
 */
class FinanceController extends BaseController
{
	/**
	 * @return void
	 */
	public function init(): void
	{
		$this->modelName = Finance::class;
		$this->searchModelName = FinanceSearch::class;
		$this->defaultValues = [
			'user_id' => Yii::$app->user->id,
		];
		
		parent::init();
	}
}

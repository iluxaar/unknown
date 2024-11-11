<?php

namespace app\controllers;

use app\models\FinanceType;
use app\search\FinanceTypeSearch;

/**
 * Class FinanceTypeController
 * @package app\controllers
 */
class FinanceTypeController extends BaseController
{
	/**
	 * @return void
	 */
	public function init(): void
	{
		$this->modelName = FinanceType::class;
		$this->searchModelName = FinanceTypeSearch::class;
		
		parent::init();
	}
}

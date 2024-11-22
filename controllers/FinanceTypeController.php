<?php

namespace app\controllers;

use app\models\FinanceType;
use app\search\FinanceTypeSearch;

/**
 * Class FinanceTypeController
 * @package app\controllers
 *
 * Типы финансовых статей
 */
class FinanceTypeController extends BaseController implements ControllerInterface
{
	/**
	 * @return string
	 */
	public function getModelName(): string
	{
		return FinanceType::class;
	}
	
	/**
	 * @return string
	 */
	public function getSearchModelName(): string
	{
		return FinanceTypeSearch::class;
	}
}

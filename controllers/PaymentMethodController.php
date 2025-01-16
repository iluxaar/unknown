<?php

namespace app\controllers;

use app\models\PaymentMethod;
use app\search\PaymentMethodSearch;

/**
 * Class PaymentMethodController
 * @package app\controllers
 *
 * Номенклатура способов оплаты
 */
class PaymentMethodController extends BaseController implements ControllerInterface
{
	/**
	 * @return string
	 */
	public function getModelName(): string
	{
		return PaymentMethod::class;
	}
	
	/**
	 * @return string
	 */
	public function getSearchModelName(): string
	{
		return PaymentMethodSearch::class;
	}
}

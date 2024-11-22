<?php

namespace app\controllers;

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

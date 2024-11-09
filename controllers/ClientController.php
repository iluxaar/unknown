<?php

namespace app\controllers;

use app\models\Client;
use app\search\ClientSearch;

/**
 * ClientController implements the CRUD actions for Client model.
 */
class ClientController extends BaseController
{
	/**
	 * @return void
	 */
	public function init(): void
	{
		$this->modelName = Client::class;
		$this->searchModelName = ClientSearch::class;
		
		parent::init();
	}
}

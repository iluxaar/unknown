<?php

namespace app\controllers;

use app\models\Service;
use app\search\ServiceSearch;

/**
 * Class ServiceController
 * @package app\controllers
 */
class ServiceController extends BaseController
{
	/**
	 * @return void
	 */
	public function init(): void
	{
		$this->modelName = Service::class;
		$this->searchModelName = ServiceSearch::class;
		
		parent::init();
	}
 
}

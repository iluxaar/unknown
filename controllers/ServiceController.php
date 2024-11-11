<?php

namespace app\controllers;

use app\models\Service;
use app\search\ServiceSearch;

/**
 * Class ServiceController
 * @package app\controllers
 */
class ServiceController extends BaseController implements ControllerInterface
{
	/**
	 * @return string
	 */
	public function getModelName(): string
	{
		return Service::class;
	}
	
	/**
	 * @return string
	 */
	public function getSearchModelName(): string
	{
		return ServiceSearch::class;
	}
}

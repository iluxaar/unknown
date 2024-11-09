<?php

namespace app\controllers;

use app\models\Visit;
use app\search\VisitSearch;

/**
 * VisitController implements the CRUD actions for Visit model.
 */
class VisitController extends BaseController
{
	/**
	 * @return void
	 */
	public function init(): void
	{
		$this->modelName = Visit::class;
		$this->searchModelName = VisitSearch::class;
		$this->defaultValues = [
			'user_id' => \Yii::$app->user->id,
		];
		
		parent::init();
	}
	
}

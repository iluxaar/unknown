<?php

namespace app\controllers;

use app\models\Material;
use app\search\MaterialSearch;
use yii\filters\VerbFilter;

/**
 * Class MaterialController
 * @package app\controllers
 */
class MaterialController extends BaseController
{
    /**
     * @inheritDoc
     */
    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
	
	/**
	 * @return void
	 */
	public function init(): void
	{
		$this->modelName = Material::class;
		$this->searchModelName = MaterialSearch::class;
		
		parent::init();
	}
	
}

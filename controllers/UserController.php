<?php

namespace app\controllers;

use app\actions\CreateAction;
use app\form\UserForm;
use app\models\User;
use app\search\UserSearch;
use yii\filters\VerbFilter;

/**
 * Class UserController
 * @package app\controllers
 */
class UserController extends BaseController
{
	/**
	 * @return array[]
	 */
	public function actions(): array
	{
		return array_merge(parent::actions(), [
			'create' => [
				'class' => CreateAction::class,
				'modelName' => UserForm::class,
			],
		]);
	}
	
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
		$this->modelName = User::class;
		$this->searchModelName = UserSearch::class;
		
		parent::init();
	}

}

<?php

namespace app\actions;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Class ListAction
 * @package app\actions
 */
class ListAction extends Action
{
	/**
	 * @var string
	 */
	public string $searchModelName;
	
	/**
	 * @var string
	 */
	public string $view = 'index';
	
	/**
	 * @return string|true[]|Response
	 * @throws NotFoundHttpException
	 * @throws InvalidConfigException
	 */
	public function run(): array|Response|string
	{
		/** @var Model $searchModel */
		$searchModel = Yii::createObject($this->searchModelName);
		$dataProvider = $searchModel->search($this->controller->request->queryParams);
		
		return $this->controller->render($this->view, [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}
	
}
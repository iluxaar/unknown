<?php

namespace app\actions;

use app\traits\FindModelTrait;
use Throwable;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Class DeleteAction
 * @package app\actions
 */
class DeleteAction extends Action
{
	use FindModelTrait;
	
	/**
	 * @var string
	 */
	public string $modelName;
	
	/**
	 * @param $id
	 * @return string|true[]|Response
	 * @throws InvalidConfigException
	 * @throws NotFoundHttpException
	 * @throws StaleObjectException
	 * @throws Throwable
	 */
	public function run($id): array|Response|string
	{
		$this->findModel($this->modelName, $id)->delete();
		
		return $this->controller->redirect(['index']);
	}
	
}
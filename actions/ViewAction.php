<?php

namespace app\actions;

use app\traits\FindModelTrait;
use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Class ViewAction
 * @package app\actions
 */
class ViewAction extends Action
{
	use FindModelTrait;
	
	/**
	 * @var string
	 */
	public string $modelName;
	
	/**
	 * @var string
	 */
	public string $view = 'view';
	
	/**
	 * @param $id
	 * @return string|true[]|Response
	 * @throws NotFoundHttpException
	 * @throws InvalidConfigException
	 */
	public function run($id): array|Response|string
	{
		$model = $this->findModel($this->modelName, $id);
		
		if (Yii::$app->request->isAjax) {
			return $this->controller->renderAjax($this->view, [
				'model' => $model,
			]);
		}
		
		return $this->controller->render($this->view, [
			'model' => $model,
		]);
	}
	
}
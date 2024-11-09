<?php

namespace app\actions;

use app\traits\FindModelTrait;
use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\db\Exception;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Class CreateAction
 * @package app\actions
 */
class UpdateAction extends Action
{
	use FindModelTrait;
	
	/**
	 * @var string
	 */
	public string $modelName;
	
	/**
	 * @var string
	 */
	public string $view = 'update';
	
	/**
	 * @param $id
	 * @return string|true[]|Response
	 * @throws NotFoundHttpException
	 * @throws InvalidConfigException|Exception
	 */
	public function run($id): array|Response|string
	{
		$model = $this->findModel($this->modelName, $id);
		
		if ($this->controller->request->isPost) {
			if ($model->load($this->controller->request->post()) && $model->save()) {
				if (Yii::$app->request->isAjax) {
					Yii::$app->response->format = Response::FORMAT_JSON;
					return ['success' => true];
				}
				return $this->controller->redirect(['index']);
			}
		}
		
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
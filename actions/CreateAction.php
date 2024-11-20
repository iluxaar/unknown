<?php

namespace app\actions;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\db\Exception;
use yii\web\Response;

/**
 * Class CreateAction
 * @package app\actions
 */
class CreateAction extends Action
{
	/**
	 * @var string
	 */
	public string $modelName;
	
	/**
	 * @var string
	 */
	public string $view = 'create';
	
	/**
	 * @var array
	 */
	public array $defaultValues = [];
	
	/**
	 * @return string|true[]|Response
	 * @throws InvalidConfigException
	 * @throws Exception
	 */
	public function run(): array|Response|string
	{
		/** @var ActiveRecord $model */
		$model = Yii::createObject($this->modelName);
		
		if (!empty($this->defaultValues)) {
			$model->setAttributes($this->defaultValues);
		}
		
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
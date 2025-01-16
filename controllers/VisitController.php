<?php

namespace app\controllers;

use app\actions\UpdateAction;
use app\models\Client;
use app\models\Visit;
use app\search\VisitSearch;
use app\traits\FindModelTrait;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\Exception;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Записи клиентов
 *
 * Class VisitController
 * @package app\controllers
 */
class VisitController extends BaseController implements ControllerInterface
{
	use FindModelTrait;
	
	/**
	 * @return string
	 */
	public function getModelName(): string
	{
		return Visit::class;
	}
	
	/**
	 * @return string
	 */
	public function getSearchModelName(): string
	{
		return VisitSearch::class;
	}
	
	public function actions(): array
	{
		return [
			'update' => [
				'class' => UpdateAction::class,
				'modelName' => $this->modelName,
			],
		];
	}
	
	/**
	 * @param $clientId
	 * @return string
	 * @throws InvalidConfigException
	 * @throws NotFoundHttpException
	 */
	public function actionIndex($clientId): string
	{
		$searchModel = Yii::createObject($this->searchModelName);
		$dataProvider = $searchModel->search($clientId, $this->request->queryParams);
		$client = $this->findModel(Client::class, $clientId);
		
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'client' => $client,
		]);
	}
	
	/**
	 * @param $clientId
	 * @return array|Response|string
	 * @throws Exception
	 * @throws InvalidConfigException
	 * @throws NotFoundHttpException
	 */
	public function actionCreate($clientId): array|Response|string
	{
		/** @var Client $client */
		$client = $this->findModel(Client::class, $clientId);
		$model = new Visit(['client_id' => $client->id]);
		
		if ($this->request->isPost) {
			if ($model->load($this->request->post()) && $model->save()) {
				if ($this->request->isAjax) {
					$this->response->format = Response::FORMAT_JSON;
					return ['success' => true];
				}
				return $this->redirect(['index', 'clientId' => $client->id]);
			}
		}
		
		if ($this->request->isAjax) {
			return $this->renderAjax('create', [
				'model' => $model,
				'client' => $client,
			]);
		}
		
		return $this->render('create', [
			'model' => $model,
			'client' => $client,
		]);
	}
	
	/**
	 * @param $id
	 * @return Response
	 * @throws InvalidConfigException
	 * @throws NotFoundHttpException
	 * @throws \Throwable
	 * @throws StaleObjectException
	 */
	public function actionDelete($id): Response
	{
		/** @var Visit $model */
		$model = $this->findModel($this->modelName, $id);
		$clientId = $model->client_id;
		$model->delete();
		
		return $this->redirect(['index', 'clientId' => $clientId]);
	}
}

<?php

namespace app\controllers;

use app\models\VisitProcedure;
use app\traits\FindModelTrait;
use yii\base\InvalidConfigException;
use yii\db\Exception;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * Class VisitProcedureController
 * @package app\controllers
 */
class VisitProcedureController extends Controller
{
	use FindModelTrait;
	
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
	 * @param $visitId
	 * @return string|true[]|Response
	 * @throws Exception
	 */
    public function actionCreate($visitId): array|Response|string
    {
        $model = new VisitProcedure(['visit_id' => $visitId]);
	    
	    if ($this->request->isPost) {
		    if ($model->load($this->request->post()) && $model->save()) {
			    if ($this->request->isAjax) {
				    $this->response->format = Response::FORMAT_JSON;
				    return ['success' => true];
			    }
			    return $this->redirect(['visit/index', 'clientId' => $model->visit->client_id]);
		    }
	    }
	    
	    if ($this->request->isAjax) {
		    return $this->renderAjax('create', [
			    'model' => $model,
		    ]);
	    }
	    
	    return $this->render('create', [
		    'model' => $model,
	    ]);
    }
	
	/**
	 * @param $id
	 * @return string|true[]|Response
	 * @throws InvalidConfigException
	 * @throws NotFoundHttpException
	 * @throws Exception
	 */
    public function actionUpdate($id): array|Response|string
    {
		/** @var VisitProcedure $model */
	    $model = $this->findModel(VisitProcedure::class, $id);
	    
	    if ($this->request->isPost) {
		    if ($model->load($this->request->post()) && $model->save()) {
			    if ($this->request->isAjax) {
				    $this->response->format = Response::FORMAT_JSON;
				    return ['success' => true];
			    }
			    return $this->redirect(['visit/index', 'clientId' => $model->visit->client_id]);
		    }
	    }
	    
	    if ($this->request->isAjax) {
		    return $this->renderAjax('update', [
			    'model' => $model,
		    ]);
	    }
	    
	    return $this->render('update', [
		    'model' => $model,
	    ]);
    }
	
	/**
	 * @param $id
	 * @return Response
	 * @throws InvalidConfigException
	 * @throws NotFoundHttpException
	 * @throws StaleObjectException
	 * @throws \Throwable
	 */
    public function actionDelete($id): Response
    {
		/** @var VisitProcedure $model */
        $model = $this->findModel(VisitProcedure::class, $id);
		$clientId = $model->visit->client_id;
		$model->delete();
		
        return $this->redirect(['visit/index', 'clientId' => $clientId]);
    }
}

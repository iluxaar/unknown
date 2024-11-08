<?php

namespace app\actions;

use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Class ErrorAction
 * @package app\actions
 */
class ErrorAction extends Action
{
    /**
     * @var Responseru
     */
    protected Response $response;

    /**
     * @return void
     */
    public function init(): void
    {
        $this->response = $this->findResponse();
    }

    /**
     * @return string
     */
    public function run(): string
    {
        $response = $this->response;

        return [
            'error' => [
                'code' => $response->getStatusCode(),
                'message' => $response->getHeaders(),
            ],
        ];
    }

    /**
     * @return Response|null
     */
    protected function findResponse(): Response|null
    {
        return Yii::$app->response;
    }
}
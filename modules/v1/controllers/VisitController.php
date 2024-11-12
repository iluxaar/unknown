<?php

namespace app\modules\v1\controllers;

use app\modules\v1\entities\visit\VisitEntity;
use app\search\VisitSearch;
use yii\base\InvalidConfigException;
use yii\rest\Controller;
use OpenApi\Attributes as OA;
use app\modules\core\attributes\ForbiddenResponse;
use app\modules\core\attributes\InvalidValidationResponse;
use app\modules\core\attributes\MethodNotAllowedResponse;

class VisitController extends Controller
{
	/**
	 * @throws InvalidConfigException
	 */
	#[OA\Get(
		path: '/visit/list',
		operationId: 'getVisits',
		description: 'Возвращает список записей клиентов',
		summary: 'Список записей',
		tags: ['visit'],
		parameters: [
			new OA\Parameter(
				name: 'id',
				description: 'id',
				in: 'query',
				required: false,
				schema: new OA\Schema(type: 'integer')
			),
		],
	)]
	#[OA\Response(
		response: 200,
		description: 'Успешный ответ',
		content: new OA\JsonContent(
			type: 'array',
			items: new OA\Items(type: VisitEntity::class)
		)
	)]
	#[ForbiddenResponse]
	#[MethodNotAllowedResponse]
	#[InvalidValidationResponse]
	public function actionList(): \yii\data\ActiveDataProvider
	{
		return (new VisitSearch())->search($this->request->queryParams);
	}
}

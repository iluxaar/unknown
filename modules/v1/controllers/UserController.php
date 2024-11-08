<?php

namespace app\modules\v1\controllers;

use app\modules\v1\entities\user\UserEntity;
use app\search\UserSearch;
use yii\rest\Controller;
use OpenApi\Attributes as OA;
use app\modules\core\attributes\ForbiddenResponse;
use app\modules\core\attributes\InvalidValidationResponse;
use app\modules\core\attributes\MethodNotAllowedResponse;

class UserController extends Controller
{
	#[OA\Get(
		path: '/user/list',
		operationId: 'getUsers',
		description: 'Возвращает список пользователей',
		summary: 'Список пользователей',
		tags: ['user'],
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
			items: new OA\Items(type: UserEntity::class)
		)
	)]
	#[ForbiddenResponse]
	#[MethodNotAllowedResponse]
	#[InvalidValidationResponse]
	public function actionList(): \yii\data\ActiveDataProvider
	{
		return (new UserSearch())->search($this->request->queryParams);
	}
}

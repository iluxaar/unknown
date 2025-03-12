<?php

namespace app\modules\v1\controllers;

use app\modules\v1\entities\visit\VisitEntity;
use app\modules\v1\services\VisitFindService;
use yii\base\InvalidConfigException;
use yii\rest\Controller;
use OpenApi\Attributes as OA;
use app\modules\core\attributes\ForbiddenResponse;
use app\modules\core\attributes\InvalidValidationResponse;
use app\modules\core\attributes\MethodNotAllowedResponse;

class VisitController extends Controller
{
	public function __construct(
		$id,
		$module,
		private readonly VisitFindService $visitFindService,
		$config = []
	) {
		parent::__construct($id, $module, $config);
	}
	
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
				name: 'start',
				description: 'Дата от',
				in: 'query',
				required: false,
				schema: new OA\Schema(type: 'string')
			),
			new OA\Parameter(
				name: 'end',
				description: 'Дата до',
				in: 'query',
				required: false,
				schema: new OA\Schema(type: 'string')
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
	public function actionList($start, $end): array
	{
		return $this->visitFindService->get($start, $end);
	}
}

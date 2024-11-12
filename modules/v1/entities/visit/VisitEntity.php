<?php

namespace app\modules\v1\entities\visit;

use OpenApi\Attributes as OA;
use yii\base\Arrayable;
use yii\base\ArrayableTrait;

#[OA\Schema(
	schema: 'VisitItemSchema',
	description: 'Запись'
)]
class VisitEntity implements Arrayable
{
	use ArrayableTrait;
	
	public function __construct(
		#[OA\Property(title: 'ID', type: 'integer')]
		private readonly int $id,
		
		#[OA\Property(title: 'clientId', type: 'integer')]
		private readonly int $clientId,
	) {
	}
	
	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}
	
	/**
	 * @return string
	 */
	public function getClientId(): string
	{
		return $this->clientId;
	}
	
}

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
		#[OA\Property(title: 'id', type: 'integer')]
		private readonly int $id,
		
		#[OA\Property(title: 'title', type: 'string')]
		private readonly string $title,
		
		#[OA\Property(title: 'start', type: 'string')]
		private readonly string $start,
		
		#[OA\Property(title: 'color', type: 'color')]
		private readonly string $color,
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
	public function getTitle(): string
	{
		return $this->title;
	}
	
	public function getStart(): string
	{
		return $this->start;
	}
	
	public function getColor(): string
	{
		return $this->color;
	}
	
}

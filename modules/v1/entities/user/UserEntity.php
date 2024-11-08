<?php

namespace app\modules\v1\entities\user;

use OpenApi\Attributes as OA;
use yii\base\Arrayable;
use yii\base\ArrayableTrait;

#[OA\Schema(
	schema: 'UserItemSchema',
	description: 'Пользователь'
)]
class UserEntity implements Arrayable
{
	use ArrayableTrait;
	
	public function __construct(
		#[OA\Property(title: 'ID', type: 'integer')]
		private readonly int $id,
		
		#[OA\Property(title: 'name', type: 'string')]
		private readonly string $name,
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
	public function getName(): string
	{
		return $this->name;
	}
	
}

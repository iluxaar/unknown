<?php
declare(strict_types=1);

namespace app\modules\core\attributes;

use app\modules\core\entities\swagger\NotFoundEntity;
use Attribute;
use OpenApi\Attributes as OA;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class NotFoundResponse extends OA\Response
{
    public function __construct()
    {
        parent::__construct(
            response: 404,
            description: 'Страница не найдена',
            content: new OA\JsonContent(
                type: NotFoundEntity::class
            )
        );
    }
}

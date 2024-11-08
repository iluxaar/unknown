<?php
declare(strict_types=1);

namespace app\modules\core\attributes;

use app\modules\core\entities\swagger\ValidationErrorEntity;
use Attribute;
use OpenApi\Attributes as OA;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class InvalidValidationResponse extends OA\Response
{
    public function __construct()
    {
        parent::__construct(
            response: 422,
            description: 'Ошибка валидации данных',
            content: new OA\JsonContent(
                type: 'array',
                items: new OA\Items(type: ValidationErrorEntity::class),
            )
        );
    }
}

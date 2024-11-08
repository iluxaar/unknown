<?php
declare(strict_types=1);

namespace app\modules\core\attributes;

use Attribute;
use OpenApi\Attributes as OA;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class SuccessJsonResponse extends OA\Response
{
    /**
     * @param string $schema - SomeClass::class
     */
    public function __construct(string $schema)
    {
        parent::__construct(
            response: 200,
            description: 'Успешно',
            content: new OA\JsonContent(
                type: $schema
            ),
        );
    }
}

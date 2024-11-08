<?php
declare(strict_types=1);

namespace app\modules\core\attributes;

use Attribute;
use OpenApi\Attributes as OA;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class ForbiddenResponse extends OA\Response
{
    public function __construct()
    {
        parent::__construct(response: 403, description: 'Доступ запрещен');
    }
}

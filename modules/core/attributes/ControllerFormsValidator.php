<?php
declare(strict_types=1);

namespace app\modules\core\attributes;

use yii\base\Model;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class ControllerFormsValidator
{
    public function __construct(public readonly Model|string $form) {}
}

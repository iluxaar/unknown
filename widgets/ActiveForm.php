<?php

namespace app\widgets;

use yii\base\Model;

/**
 * Class ActiveForm
 * @package app\widgets
 *
 * @method ActiveField field(Model $model, string $attribute, array $options = [])
 */
class ActiveForm extends \kartik\form\ActiveForm
{
	/**
	 * @var bool
	 */
	public $enableClientValidation = false;
	
	/**
	 * @var string
	 */
	public $type = self::TYPE_VERTICAL;
	
	/**
	 * @var string
	 */
	public $fieldClass = ActiveField::class;
	
	/**
	 * @var string[]
	 */
	public $options = [
		'autocomplete' => 'off',
		'class' => 'modal-form',
	];
}
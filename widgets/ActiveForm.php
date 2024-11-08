<?php

namespace app\widgets;

/**
 * Class ActiveForm
 * @package app\widgets
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
	public $type = self::TYPE_HORIZONTAL;
	
	/**
	 * @var string[]
	 */
	public $options = [
		'autocomplete' => 'off',
	];
}
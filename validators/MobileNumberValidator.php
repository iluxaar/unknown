<?php

namespace app\validators;

use Yii;
use yii\validators\Validator;

/**
 * Class MobileNumberValidator
 * @package app\validators
 */
class MobileNumberValidator extends Validator
{
	/**
	 * @var string
	 */
	protected string $regexp = '/^([+]7) [(](\d{3})[)] \d{3}[-]\d{2}[-]\d{2}/';
	
	/**
	 * @param $model
	 * @param $attribute
	 * @return void
	 */
	public function validateAttribute($model, $attribute): void
	{
		if (!preg_match($this->regexp, $model->$attribute)) {
			$this->addError($model, $attribute, Yii::t('app','Неверный формат мобильного номера'));
		}
	}
}
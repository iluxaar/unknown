<?php

namespace app\widgets;

use kartik\icons\Icon;
use yii\base\InvalidConfigException;
use yii\bootstrap4\ButtonDropdown;
use yii\grid\Column;

/**
 * Class DropdownActionColumn
 * @package app\widgets
 */
class DropdownActionColumn extends Column
{
	/**
	 * @var callable
	 */
	public $items;
	
	public $contentOptions = [
		'class' => 'action-column',
	];
	
	/**
	 * @param $model
	 * @param $key
	 * @param $index
	 * @return string
	 * @throws \Throwable
	 * @throws InvalidConfigException
	 */
	protected function renderDataCellContent($model, $key, $index): string
	{
		return ButtonDropdown::widget([
			'label' => Icon::show('bars'),
			'encodeLabel' => false,
			'buttonOptions' => ['class' => 'btn btn-light'],
			'dropdown' => [
				'options' => ['class' => 'dropdown-menu dropdown-menu-right'],
				'items' => call_user_func($this->items, $model, $key, $index),
			],
		]);
	}
}
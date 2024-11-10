<?php

namespace app\widgets;

use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;

/**
 * Class ActiveField
 * @package app\widgets
 */
class ActiveField extends \kartik\form\ActiveField
{
	/**
	 * @param $items
	 * @param $options
	 * @param $pluginOptions
	 * @return $this
	 * @throws \Throwable
	 */
	public function select2($items, $options = [], $pluginOptions = [])
	{
		$this->parts['{input}'] = Select2::widget([
			'model' => $this->model,
			'attribute' => $this->attribute,
			'data' => $items,
			'options' => array_merge(['placeholder' => ''], $options),
			'pluginOptions' => array_merge([
				'allowClear' => true,
				'dropdownParent' => '#modal-ajax',
			], $pluginOptions),
		]);
		
		return $this;
	}
	
	/**
	 * @param $config
	 * @return $this
	 * @throws \Throwable
	 */
	public function datePicker($config = [])
	{
		$this->parts['{input}'] = DatePicker::widget(array_merge([
			'model' => $this->model,
			'attribute' => $this->attribute,
			'type' => DatePicker::TYPE_INPUT,
			'size' => 'sm',
			'options' => [
				'autoclose' => true,
				'autocomplete' => 'off',
			],
		], $config));
		
		return $this;
	}
	
	/**
	 * @param $config
	 * @return $this
	 * @throws \Throwable
	 */
	public function dateTimePicker($config = [])
	{
		$this->parts['{input}'] = DateTimePicker::widget(array_merge([
			'model' => $this->model,
			'attribute' => $this->attribute,
			'type' => DateTimePicker::TYPE_INPUT,
			'pluginOptions' => [
				'autoclose' => true,
				'format' => 'dd.mm.yyyy hh:ii'
			]
		], $config));
		
		return $this;
	}
}
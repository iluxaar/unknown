<?php

namespace app\widgets;

use Throwable;

/**
 * Class GridView
 * @package app\widgets
 */
class GridView extends \yii\grid\GridView
{
	/**
	 * @var string[]
	 */
	public $tableOptions = [
		'class' => 'table',
	];
	
	/**
	 * @var string[]
	 */
	public $pager = [
		'class' => 'yii\bootstrap4\LinkPager'
	];
	
	/**
	 * @var string
	 */
	public $layout = "{items}\n<div class='container-fluid grid-footer'>{summary}\n{pager}</div>";
	
	/**
	 * @var bool
	 */
	public $pjax = true;
	
	/**
	 * @var array
	 */
	public $pjaxSettings = [
		'loadingCssClass' => false,
	];
	
	/**
	 * @return void
	 * @throws Throwable
	 */
	public function run(): void
	{
		parent::run();
		
		echo ModalAjax::widget([
			'selector' => 'a.modal-ajax-link',
			'pjaxContainer' => "#{$this->id}",
		]);
	}
}
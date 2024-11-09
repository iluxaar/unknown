<?php

namespace app\widgets;

use Throwable;

/**
 * Class GridView
 * @package app\widgets
 */
class GridView extends \kartik\grid\GridView
{
	/**
	 * @var string[]
	 */
	public $tableOptions = ['class' => 'table table-hover'];
	
	/**
	 * @var string[]
	 */
	public $pager = [
		'class' => 'yii\bootstrap4\LinkPager'
	];
	
	/**
	 * @var string
	 */
	public $layout = "{items}\n<div class='container grid-footer'>{summary}\n{pager}</div>";
	
	/**
	 * @var bool
	 */
	public $resizableColumns = false;
	
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
			'id' => 'modal-ajax',
			'selector' => 'a.modal-ajax-link',
			'pjaxContainer' => "#{$this->id}",
		]);
	}
}
<?php

namespace app\widgets;

use Throwable;

/**
 * Class GridView
 * @package app\widgets
 */
class GridView extends \yii\grid\GridView
{
	private const DEFAULT_PAGE_SIZE = 10;
	
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
	public bool $pjax = true;
	
	/**
	 * @var array
	 */
	public array $pjaxSettings = [
		'loadingCssClass' => false,
	];
	
	/**
	 * @return void
	 * @throws \yii\base\InvalidConfigException
	 */
	public function init(): void
	{
		parent::init();
		
		if ($pagination = $this->dataProvider->getPagination()) {
			$pagination->setPageSize(self::DEFAULT_PAGE_SIZE);
		}
		
	}
	
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
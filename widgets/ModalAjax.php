<?php

namespace app\widgets;

/**
 * Class ModalAjax
 * @package app\widgets
 */
class ModalAjax extends \ivankff\yii2ModalAjax\ModalAjax
{
	/**
	 * @return void
	 */
	public function init()
	{
		$this->bootstrapVersion = self::BOOTSTRAP_VERSION_4;
		$this->ajaxSubmit = true;
		$this->options = ['class' => 'header-default fade-modal'];
		$this->autoClose = true;
		
		parent::init();
		
		
	}
}
<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\YiiAsset;
use yii\bootstrap4\BootstrapAsset;

/**
 * Class AppAsset
 * @package app\assets\app
 */
class AppAsset extends AssetBundle
{
	public $sourcePath = '@app/assets/app/themes/main';
    public $css = [
        'css/site.scss',
    ];
    public $depends = [
	    YiiAsset::class,
	    BootstrapAsset::class,
    ];
	
	/**
	 * @return void
	 */
	public function init(): void
	{
		if (YII_ENV_DEV) {
			$this->publishOptions['forceCopy'] = true;
		}
		
		parent::init();
	}
}

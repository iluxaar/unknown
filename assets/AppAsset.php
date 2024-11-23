<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 * @package app\assets\app
 */
class AppAsset extends AssetBundle
{
	public $sourcePath = '@app/assets/app';
    public $css = [
        'css/site.scss',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}

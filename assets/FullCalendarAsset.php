<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class ChoiceAsset
 * @package app\assets
 */
class FullCalendarAsset extends AssetBundle
{
	public $sourcePath = '@app/assets/fullcalendar';
    public $js = [
        'dist/index.global.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}

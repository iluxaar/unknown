<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class ChoiceAsset
 * @package app\assets
 */
class ChoiceAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'choice/css/choice.css',
    ];
    public $js = [
        'choice/js/choice.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}

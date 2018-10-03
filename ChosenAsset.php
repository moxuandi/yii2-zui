<?php
namespace moxuandi\zui;

use yii\web\AssetBundle;

/**
 * Class ChosenAsset 为`JS插件 - Chosen`提供css|js脚本支持.
 */
class ChosenAsset extends AssetBundle
{
    public $sourcePath = '@vendor/moxuandi/yii2-zui/assets';

    public $css = [
        'dist/lib/chosen/chosen.min.css',
    ];

    public $js = [
        'dist/lib/chosen/chosen.min.js',
    ];

    public $depends = [
        'moxuandi\zui\ZuiPluginAsset',
    ];
}

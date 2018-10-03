<?php
namespace moxuandi\zui;

use yii\web\AssetBundle;

/**
 * Class ChosenIconsAsset 为`JS插件 - Chosen 图标选择`提供css|js脚本支持.
 */
class ChosenIconsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/moxuandi/yii2-zui/assets';

    public $css = [
        'dist/lib/chosenicons/zui.chosenicons.min.css',
    ];

    public $js = [
        'dist/lib/chosenicons/zui.chosenicons.min.js',
    ];

    public $depends = [
        'moxuandi\zui\ChosenAsset',
    ];
}

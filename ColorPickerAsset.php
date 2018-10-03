<?php
namespace moxuandi\zui;

use yii\web\AssetBundle;

/**
 * Class ColorPickerAsset 为`JS插件 - 颜色选择器`提供css|js脚本支持.
 */
class ColorPickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/moxuandi/yii2-zui/assets';

    public $css = [
        'dist/lib/colorpicker/zui.colorpicker.min.css',
    ];

    public $js = [
        'dist/lib/colorpicker/zui.colorpicker.min.js',
    ];

    public $depends = [
        'moxuandi\zui\ZuiPluginAsset',
    ];
}

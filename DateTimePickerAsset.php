<?php
namespace moxuandi\zui;

use yii\web\AssetBundle;

/**
 * Class DateTimePickerAsset 为`JS插件 - 日期选择`提供css|js脚本支持.
 */
class DateTimePickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/moxuandi/yii2-zui/assets';

    public $css = [
        'dist/lib/datetimepicker/datetimepicker.min.css',
    ];

    public $js = [
        'dist/lib/datetimepicker/datetimepicker.min.js',
    ];

    public $depends = [
        'moxuandi\zui\ZuiPluginAsset',
    ];
}

<?php
namespace moxuandi\zui;

use yii\web\AssetBundle;

/**
 * Class PrettifyAsset 为`组件 - 代码 - 代码高亮`提供js脚本支持.
 */
class PrettifyAsset extends AssetBundle
{
    public $sourcePath = '@vendor/moxuandi/yii2-zui/assets';

    public $js = [
        'dist/lib/prettify/prettify.js',
    ];

    public $depends = [
        'moxuandi\zui\ZuiPluginAsset',
    ];
}

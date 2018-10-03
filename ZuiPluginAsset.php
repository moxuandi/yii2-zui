<?php
namespace moxuandi\zui;

use yii\web\AssetBundle;

/**
 * Class ZuiPluginAsset 提供ZUI核心js脚本支持.
 */
class ZuiPluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/moxuandi/yii2-zui/assets';

    public $js = [
        'dist/js/zui.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'moxuandi\zui\ZuiAsset',
    ];
}

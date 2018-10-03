<?php
namespace moxuandi\zui;

use yii\web\AssetBundle;

/**
 * Class ZuiAsset 提供ZUI核心css样式支持.
 */
class ZuiAsset extends AssetBundle
{
    public $sourcePath = '@vendor/moxuandi/yii2-zui/assets';

    public $css = [
        'dist/css/zui.min.css',
    ];
}

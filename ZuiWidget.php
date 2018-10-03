<?php
namespace moxuandi\zui;

use Yii;

/**
 * Class ZuiWidget
 *
 * 只有一些需要注册客户端 js 脚本的扩展才会继承自这个类, 例如:
 * Modal(对话框|模态框)
 * Tab(标签页)
 * Carousel(轮播)
 * Collapse(折叠, 待定)
 *
 */
class ZuiWidget extends Widget
{
    use ZuiWidgetTrait;

    public $options = [];
}

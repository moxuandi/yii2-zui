<?php
namespace moxuandi\zui;

use Yii;

/**
 * 解决 PhpStorm 调用 widget() 时黄色提示.
 */
class InputWidget extends \yii\widgets\InputWidget
{
    /**
     * 解决 PhpStorm 调用 widget() 时黄色提示.
     * @param array $config
     * @return string
     */
    public static function widget($config = [])
    {
        return parent::widget($config);
    }
}

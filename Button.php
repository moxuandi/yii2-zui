<?php
namespace moxuandi\zui;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Button 按钮.
 *
 * @see http://zui.sexy/#control/button
 */
class Button extends Widget
{
    /**
     * @var array 按钮的 HTML 属性.
     * - `tag`: string, optional, 标签名称, 默认为`button`.
     */
    public $options = [];
    /**
     * @var string 按钮的内容.
     */
    public $label = 'Button';
    /**
     * @var bool 按钮的内容是否 HTML 编码.
     */
    public $encodeLabel = true;


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'btn']);
    }

    public function run()
    {
        parent::run();

        ZuiAsset::register($this->getView());  // 需要 css 支持

        return self::renderButton();
    }

    /**
     * 渲染按钮.
     * @return string
     */
    protected function renderButton()
    {
        $label = $this->encodeLabel ? Html::encode($this->label) : $this->label;
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'button');
        switch($tag){
            case 'a':
                return Html::a($label, ArrayHelper::remove($options, 'url', '#'), $options);
                break;
            case 'input':
                return Html::input(ArrayHelper::remove($options, 'type', 'button'), null, $label, $options);
                break;
            default:
                return Html::button($label, $options);
                break;
        }
    }
}

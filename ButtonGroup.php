<?php
namespace moxuandi\zui;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 ButtonGroup 按钮组.
 *
 * @see http://zui.sexy/#component/buttongroup
 */
class ButtonGroup extends Widget
{
    /**
     * @var array 按钮组的 HTML 属性.
     */
    public $options = [];
    /**
     * @var array 按钮组列表. 每个数组元素表示一个单独的按钮, 数组结构如下(参考 Button):
     * -`label`: string, optional, 按钮的内容, 默认为`Button`;
     * -`encodeLabel`: bool, optional, 按钮的内容是否 HTML 编码, 默认为`true`;
     * -`options`: array, optional, 按钮的 HTML 属性, 默认为`[]`;
     * -`visible`: bool, optional, 该按钮是否可见, 默认为`true`;
     */
    public $buttons = [];
    /**
     * @var bool 按钮的内容是否 HTML 编码.
     */
    public $encodeLabels = true;


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'btn-group']);
    }

    public function run()
    {
        parent::run();

        ZuiAsset::register($this->getView());  // 需要 css 支持

        return implode("\n", [
            Html::beginTag('div', $this->options),
            self::renderButtons(),
            Html::endTag('div')
        ]);
        //return Html::tag('div', self::renderButtons(), $this->options);
    }

    /**
     * 渲染按钮元素.
     * @return string
     */
    protected function renderButtons()
    {
        $buttons = [];
        foreach($this->buttons as $button){
            if(is_array($button)){
                if(ArrayHelper::remove($button, 'visible', true) === false){
                    continue;
                }

                if(!ArrayHelper::keyExists('encodeLabel', $button)){
                    $button['encodeLabel'] = $this->encodeLabels;
                }
                $buttons[] = Button::widget($button);
            }else{
                $buttons[] = $button;
            }
        }
        return implode("\n", $buttons);
    }
}

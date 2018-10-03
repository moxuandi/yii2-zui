<?php
namespace moxuandi\zui;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 alert 消息框.
 *
 * @see http://zui.sexy/#component/alert
 */
class Alert extends Widget
{
    /**
     * @var array `div.alert`的 HTML 属性.
     */
    public $options = [];
    /**
     * @var string 主体内容.
     */
    public $body;
    /**
     * @var array|false `div.alert > button`的 HTML 属性. 特殊属性:
     * -`tag`: string, optional, 按钮的标签名称, 默认为`button`;
     * -`label`: string, optional, 按钮的文本内容, 默认为`&times;`;
     * -`type`: string, optional, 按钮的 type 属性值(仅`tag='button'`), 默认为`button`;
     */
    public $closeButton = false;
    /**
     * @var array|false `div.alert > i`的 HTML 属性. 特殊属性:
     * -`tag`: string, optional, 图标的标签名称, 默认为`i`;
     */
    public $icon = false;


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'alert']);
        if($this->closeButton !== false){
            Html::addCssClass($this->options, ['dismissable' => 'alert-dismissable']);
        }
        if($this->icon !== false){
            Html::addCssClass($this->options, ['icon' => 'with-icon']);
            echo Html::beginTag('div', $this->options) . "\n";  // `div.alert`的开始标签
            echo self::renderIcon();  // 渲染图标
            echo Html::beginTag('div', ['class' => 'content']);  // `div.alert > div.content`的开始标签
        }else{
            echo Html::beginTag('div', $this->options) . "\n";  // `div.alert`的开始标签
        }
    }

    public function run()
    {
        parent::run();

        if($this->icon !== false){
            echo $this->body . Html::endTag('div') . "\n";  // `div.alert > div.content`的结束标签
        }else{
            echo $this->body . "\n";
        }
        echo self::renderCloseButton();  // 渲染关闭按钮
        echo Html::endTag('div');  // `div.alert`的结束标签

        ZuiPluginAsset::register($this->getView());  // 需要 js 支持
    }

    /**
     * 渲染消息框右上角的关闭按钮.
     * @return null|string
     */
    protected function renderCloseButton()
    {
        if(($closeButton = $this->closeButton) !== false){
            $tag = ArrayHelper::remove($closeButton, 'tag', 'button');
            $label = ArrayHelper::remove($closeButton, 'label', '&times;');
            $closeButton = array_merge([
                'data-dismiss' => 'alert',
                'aria-hidden' => 'true',
                'class' => 'close'
            ], $closeButton);
            if($tag === 'button' && !isset($closeButton['type'])){
                $closeButton['type'] = 'button';
            }

            return Html::tag($tag, $label, $closeButton) . "\n";
        }else{
            return null;
        }
    }

    /**
     * 渲染图标.
     * @return null|string
     */
    protected function renderIcon()
    {
        if(($icon = $this->icon) !== false){
            $tag = ArrayHelper::remove($icon, 'tag', 'i');
            return Html::tag($tag, '', $icon) . "\n";
        }else{
            return null;
        }
    }
}

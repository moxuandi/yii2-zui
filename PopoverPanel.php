<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个静态的 Popover 弹出面板.
 *
 * @see http://zui.sexy/#javascript/popover
 */
class PopoverPanel extends Widget
{
    /**
     * @var array 按钮的 HTML 属性. 特殊属性:
     * - `tag`: string, optional, 标签名称, 可用值: `button`(默认), `a`.
     */
    public $options = [];
    /**
     * @var string 面板标题(div.popover-title)的内容.
     */
    public $header;
    /**
     * @var array 面板标题(h3.popover-title)的 HTML 属性. 特殊属性:
     * - `tag`: string, optional, 标签名称, 默认为:`h3`.
     */
    public $headerOptions = [];
    /**
     * @var string 面板正文(div.popover-content)的内容.
     */
    public $content = '';
    /**
     * @var array 面板正文(div.popover-content)的 HTML 属性.
     */
    public $contentOptions = [];
    /**
     * @var bool 面板标题(div.popover-title)的内容是否 HTML 编码.
     */
    public $encodeLabel = true;
    /**
     * @var bool|string 弹出方向(箭头的位置). 可用值:
     * - `false`: 不带箭头;
     * - `top`: 从上方弹出, 箭头在下方;
     * - `bottom`: 从下方弹出, 箭头在上方;
     * - `left`: 从左侧弹出, 箭头在右方;
     * - `right`: 从右侧弹出, 箭头在左方;
     */
    public $arrowPosition = false;


    public function init()
    {
        parent::init();
        self::initOptions();
    }

    public function run()
    {
        parent::run();

        ZuiPluginAsset::register($this->getView());  // 需要 js 支持

        return self::renderPopover();
    }

    /**
     * 渲染弹出面板.
     * @return string
     */
    protected function renderPopover()
    {
        $popover = $this->arrowPosition ? "<div class='arrow'></div>\n" : '';
        $popover .= Html::tag(ArrayHelper::remove($this->headerOptions, 'tag', 'h3'), $this->encodeLabel ? Html::encode($this->header) : $this->header, $this->headerOptions) . "\n";
        $popover .= implode("\n", [
            Html::beginTag('div', $this->contentOptions),
            $this->content,
            Html::endTag('div')
        ]);

        return implode("\n", [
            Html::beginTag('div', $this->options),
            $popover,
            Html::endTag('div')
        ]);
    }

    /**
     * 初始化各项属性.
     * @throws InvalidConfigException `content`或`header`类型不符合要求.
     */
    protected function initOptions()
    {
        if(!in_array($this->arrowPosition, [false, 'top', 'bottom', 'left', 'right'], true)){
            throw new InvalidConfigException("The 'arrowPosition' option should be is false, 'top', 'bottom', 'left', 'right'.");
        }

        if(!is_string($this->header)){
            throw new InvalidConfigException("The 'header' option should be a string.");
        }

        if($this->arrowPosition){
            Html::addCssClassBefore($this->options, ['position' => $this->arrowPosition]);
        }
        Html::addCssClassBefore($this->options, ['widget' => 'popover']);
        Html::addCssClassBefore($this->headerOptions, ['widget' => 'popover-title']);
        Html::addCssClassBefore($this->contentOptions, ['widget' => 'popover-content']);
    }
}

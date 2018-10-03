<?php
namespace moxuandi\zui;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Modal 模态框/对话框.
 *
 * @see http://zui.sexy/#javascript/modal
 */
class Modal extends ZuiWidget
{
    /**
     * @var array 参数继承. `div.modal`的 HTML 属性.
     */
    //public $options = [];
    /**
     * @var string `div.modal > div.modal-dialog > div.modal-content > div.modal-header`的文本内容.
     */
    public $header;
    /**
     * @var string `div.modal > div.modal-dialog > div.modal-content > div.modal-footer`的文本内容.
     */
    public $footer;
    /**
     * @var array `div.modal > div.modal-dialog`的 HTML 属性.
     */
    public $modalDialogOptions = [];
    /**
     * @var array `div.modal > div.modal-dialog > div.modal-content`的 HTML 属性.
     */
    public $modalContentOptions = [];
    /**
     * @var array `div.modal > div.modal-dialog > div.modal-content > div.modal-header`的 HTML 属性.
     */
    public $headerOptions = [];
    /**
     * @var array `div.modal > div.modal-dialog > div.modal-content > div.modal-body`的 HTML 属性.
     */
    public $bodyOptions = [];
    /**
     * @var array `div.modal > div.modal-dialog > div.modal-content > div.modal-footer`的 HTML 属性.
     */
    public $footerOptions = [];
    /**
     * @var array|false 模态框/对话框头部右上角关闭按钮的 HTML 属性. 特殊属性:
     * -`tag`: string, optional, 按钮的标签名称, 默认为`button`;
     * -`label`: string, optional, 按钮的文本内容, 默认为`&times;`;
     * -`type`: string, optional, 按钮的 type 属性值(仅`tag='button'`), 默认为`button`;
     */
    public $closeButton = [];
    /**
     * @var array|false 模态框/对话框触发按钮的 HTML 属性. 特殊属性:
     * -`tag`: string, optional, 按钮的标签名称, 默认为`button`;
     * -`label`: string, optional, 按钮的文本内容, 默认为`Show`;
     * -`type`: string, optional, 按钮的 type 属性值(仅`tag='button'`), 默认为`button`;
     * -`data-toggle`: string, required, 点击该按钮或链接会显示/隐藏对话框. 值必须是为`modal`;
     * -`data-target`: string, required, 静态对话框的ID属性. 默认为`#w0`;
     * -`data-name`: string, optional, 对话框名称, 默认为`triggerModal`;
     * -`data-backdrop`: string, optional, 是否启用背景遮罩. 可用值:
     * -----`true`: 启用(默认);
     * -----`false`: 不启用;
     * -----`static`: 启用背景遮罩, 但点击背景遮罩时不会触发关闭对话框的过程;
     * -`data-keyboard`: bool, optional, 按下`esc`键时是否关闭对话框. 默认为`true`;
     * -`data-show`: bool, optional, 是否在对话框初始化之后立即显示出来. 默认为`true`;
     * -`data-position`: string, optional, 对话框的显示位置. 可用值;
     * -----`fit`: 最佳位置, 窗口中部稍偏上的地方(默认);
     * -----`center`: 窗口中间;
     * -----`0`: 最顶部;
     * -----`200`: 指定距离顶部的像素;
     * -----CSS支持的所有表示位置的值, 用来指定距离顶部的偏移;
     * -`data-moveable`: string, optional, 是否启用对话框拖拽移动功能. 可用值;
     * -----`false`: 不启用(默认);
     * -----`true`: 启用;
     * -----`inside`: 启用并限制对话框只能移动到窗口内部(禁止移动对话框到窗口可视区域之外);
     * -`data-remember-pos`: string, optional, 记住对话框移动后的位置(需同时启用`data-moveable`选项). 可用值;
     * -----`false`: 不记住位置(默认);
     * -----`true`: 记住位置, 但关闭页面或浏览器之后会复位;
     * -----一个在页面范围内值唯一的字符串, 通过浏览器本地存储来存储数据, 关闭页面或浏览器之后也不会忘记;
     */
    public $toggleButton = false;
    /**
     * @var bool 是否启用动画效果. 给`$options`添加`.fade`类.
     */
    public $fade = true;


    public function init()
    {
        parent::init();
        self::initOptions();

        echo self::renderToggleButton() . "\n";  // 渲染触发按钮
        echo Html::beginTag('div', $this->options) . "\n";  // `div.modal`的开始标签
        echo Html::beginTag('div', $this->modalDialogOptions) . "\n";  // `div.modal-dialog`的开始标签
        echo Html::beginTag('div', $this->modalContentOptions) . "\n";  // `div.modal-content`的开始标签
        echo self::renderHeader() . "\n";  // 渲染`div.modal-header`.
        echo Html::beginTag('div', $this->bodyOptions) . "\n";  // `div.modal-body`的开始标签
    }

    public function run()
    {
        parent::run();

        echo "\n" . Html::endTag('div') . "\n";  // `div.modal-body`的结束标签
        echo self::renderFooter() . "\n";  // 渲染`div.modal-footer`.
        echo Html::endTag('div') . "\n";  // `div.modal-content`的结束标签
        echo Html::endTag('div') . "\n";  // `div.modal-dialog`的结束标签
        echo Html::endTag('div');  // `div.modal`的结束标签

        $this->registerPlugin('modal');
    }

    /**
     * 渲染模态框/对话框的头部(`div.modal > div.modal-dialog > div.modal-content > div.modal-header`).
     * @return null|string
     */
    protected function renderHeader()
    {
        $button = self::renderCloseButton();
        if($button !== null){
            $this->header = $button . "\n" . $this->header;
        }
        if($this->header !== null){
            Html::addCssClassBefore($this->headerOptions, ['widget' => 'modal-header']);
            return implode("\n", [
                Html::beginTag('div', $this->headerOptions),
                $this->header,
                Html::endTag('div')
            ]);
            //return Html::tag('div', $this->header, $this->headerOptions);
        }else{
            return null;
        }
    }

    /**
     * 渲染模态框/对话框的底部(`div.modal > div.modal-dialog > div.modal-content > div.modal-footer`).
     * @return null|string
     */
    protected function renderFooter()
    {
        if($this->footer !== null){
            Html::addCssClassBefore($this->footerOptions, ['widget' => 'modal-footer']);
            return Html::tag('div', "\n" . $this->footer . "\n", $this->footerOptions);
        }else{
            return null;
        }
    }

    /**
     * 渲染模态框/对话框头部右上角的关闭按钮.
     * @return null|string
     */
    protected function renderCloseButton()
    {
        if(($closeButton = $this->closeButton) !== false){
            $tag = ArrayHelper::remove($closeButton, 'tag', 'button');
            //$label = ArrayHelper::remove($closeButton, 'label', '&times;');
            $label = ArrayHelper::remove($closeButton, 'label', '<span aria-hidden="true">×</span><span class="sr-only">关闭</span>');
            if($tag === 'button' && !isset($closeButton['type'])){
                $closeButton['type'] = 'button';
            }
            return Html::tag($tag, $label, $closeButton);
        }else{
            return null;
        }
    }

    /**
     * 渲染模态框/对话框的触发按钮.
     * @return null|string
     */
    protected function renderToggleButton()
    {
        if(($toggleButton = $this->toggleButton) !== false){
            $tag = ArrayHelper::remove($toggleButton, 'tag', 'button');
            $label = ArrayHelper::remove($toggleButton, 'label', 'Show');
            if($tag === 'button' && !isset($toggleButton['type'])){
                $toggleButton['type'] = 'button';
            }
            return Html::tag($tag, $label, $toggleButton);
        }else{
            return null;
        }
    }

    /**
     * 初始化各项属性.
     */
    protected function initOptions()
    {
        Html::addCssClassBefore($this->options, ['widget' => 'modal']);
        if($this->fade){
            Html::addCssClass($this->options, ['fade' => 'fade']);
        }
        //$this->options = array_merge(['role' => 'dialog', 'tabindex' => -1], $this->options);  // Bootstrap 需要, ZUI 不需要

        Html::addCssClassBefore($this->modalDialogOptions, ['widget' => 'modal-dialog']);
        //$this->modalDialogOptions = array_merge(['role' => 'document'], $this->modalDialogOptions);  // Bootstrap 需要, ZUI 不需要

        Html::addCssClassBefore($this->modalContentOptions, ['widget' => 'modal-content']);

        Html::addCssClassBefore($this->bodyOptions, ['widget' => 'modal-body']);

        if($this->toggleButton !== false){
            $this->toggleButton = array_merge(['data-toggle' => 'modal'], $this->toggleButton);
            if(!isset($this->toggleButton['data-target']) && !isset($this->toggleButton['href'])){
                $this->toggleButton['data-target'] = '#' . $this->options['id'];
            }
        }

        if($this->closeButton !== false){
            $this->closeButton = array_merge([
                'data-dismiss' => 'modal',
                //'aria-hidden' => 'true',  // Bootstrap 需要, ZUI 不需要
                'class' => 'close'
            ], $this->closeButton);
        }

        if($this->clientOptions !== false){
            $this->clientOptions = array_merge(['show' => false], $this->clientOptions);
        }
    }
}

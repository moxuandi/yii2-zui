<?php
namespace moxuandi\zui;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个动态的 Popover 弹出面板.
 * 基于 Button, 添加了弹出面板触发器的参数.
 *
 * @see http://zui.sexy/#javascript/popover
 */
class Popover extends ZuiWidget
{
    /**
     * @var array 参数继承. 按钮的 HTML 属性.
     * - `tag`: string, optional, 标签名称, 可用值: `button`(默认), `a`.
     * - `title`: string, required, 弹出面板标题(h3.popover-title)的内容.
     * - `data-original-title`: string, required, 弹出面板标题(h3.popover-title)的内容(同`title`).
     * - `data-content`: string, required, 面板正文(div.popover-content)的内容.
     * - 更多参数, 查看[使用说明](docs/javascript-popover.md#选项)或[官方文档](http://zui.sexy/#javascript/popover)
     */
    public $options = [];
    /**
     * @var string 按钮的内容.
     */
    public $label = '弹出面板';
    /**
     * @var bool 按钮的内容是否 HTML 编码.
     */
    public $encodeLabel = true;


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'btn']);
        $this->options['data-toggle'] = 'popover';

        if($this->clientOptions === false){
            $this->clientOptions = [];
        }
    }

    public function run()
    {
        parent::run();

        $this->registerPlugin('popover');

        return self::renderButton();
    }

    /**
     * 渲染按钮.
     * @return string
     */
    protected function renderButton()
    {
        $label = $this->encodeLabel ? Html::encode($this->label) : $this->label;

        // 如果不处理, zui.js 会自动用`title`值填充`data-original-title`值, 并设置`title`值为空
        if(ArrayHelper::keyExists('title', $this->options) && !ArrayHelper::keyExists('data-original-title', $this->options)){
            $this->options['data-original-title'] = ArrayHelper::remove($this->options, 'title');
        }

        if(ArrayHelper::remove($this->options, 'tag', 'button') === 'a'){
            return Html::a($label, ArrayHelper::remove($this->options, 'url', '#'), $this->options);
        }else{
            return Html::button($label, $this->options);
        }
    }
}

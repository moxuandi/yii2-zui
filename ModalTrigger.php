<?php
namespace moxuandi\zui;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 ModalTrigger 模态框/对话框触发器.
 * 基于 Button, 添加了对话框触发器的参数.
 *
 * @see http://zui.sexy/#javascript/modaltrigger
 */
class ModalTrigger extends ZuiWidget
{
    /**
     * @var array 参数继承. 按钮的 HTML 属性.
     * - `tag`: string, optional, 标签名称, 可用值: `button`(默认), `a`.
     */
    public $options = [];
    /**
     * @var string 按钮的内容.
     */
    public $label = '对话框';
    /**
     * @var bool 按钮的内容是否 HTML 编码.
     */
    public $encodeLabel = true;


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'btn']);
        $this->options['data-toggle'] = 'modal';
    }

    public function run()
    {
        parent::run();

        $this->registerPlugin('modalTrigger');

        return self::renderButton();
    }

    /**
     * 渲染按钮.
     * @return string
     */
    protected function renderButton()
    {
        $label = $this->encodeLabel ? Html::encode($this->label) : $this->label;

        if(ArrayHelper::remove($this->options, 'tag', 'button') === 'a'){
            return Html::a($label, ArrayHelper::remove($this->options, 'url', '#'), $this->options);
        }else{
            return Html::button($label, $this->options);
        }
    }
}

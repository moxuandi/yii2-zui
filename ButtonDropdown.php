<?php
namespace moxuandi\zui;

use Yii;

/**
 * 渲染一个 Dropdown 下拉菜单.
 *
 * @see http://zui.sexy/#javascript/dropdown
 */
class ButtonDropdown extends Widget
{
    /**
     * @var array 最外层的 HTML 属性.
     */
    public $options = ['class' => 'btn-group'];
    /**
     * @var string 按钮的内容.
     */
    public $label = 'Button';
    /**
     * @var array 按钮的 HTML 属性, 特殊可用参数:
     * -`tag`: string, optional, 按钮的标签名称, 默认为`button`;
     */
    public $buttonOptions = [];
    /**
     * @var array 下拉菜单的菜单项配置, Dropdown 中的所有参数都可以使用.
     */
    public $dropdown = [];
    /**
     * @var bool 是否显示为分割按钮组
     */
    public $split = false;
    /**
     * @var bool 按钮的内容是否 HTML 编码.
     */
    public $encodeLabel = true;
    /**
     * @var array 三角图标:
     */
    public $caret = '<span class="caret"></span>';


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();

        ZuiPluginAsset::register($this->getView());  // 需要 js 支持

        return implode("\n", [
            Html::beginTag('div', $this->options),
            $this->renderButton(),
            $this->renderDropdown(),
            Html::endTag('div')
        ]);
    }

    /**
     * 渲染按钮.
     * @return string
     */
    protected function renderButton()
    {
        $label = $this->encodeLabel ? Html::encode($this->label) : $this->label;
        $options = $this->buttonOptions;
        if($this->split){
            $splitOptions = $options;
            Html::addCssClass($splitOptions, ['toggle' => 'dropdown-toggle']);
            $splitOptions['data-toggle'] = 'dropdown';
            $splitButton = Button::widget([
                'options' => $splitOptions,
                'label' => $this->caret,
                'encodeLabel' => false,
                'view' => $this->getView(),
            ]);
        }else{
            $label .= ' ' . $this->caret;
            if(!isset($options['href']) && $options['tag'] === 'a'){
                $options['href'] = '#';
            }
            Html::addCssClassBefore($options, ['toggle' => 'dropdown-toggle']);
            $options['data-toggle'] = 'dropdown';
            $splitButton = '';
        }

        $button = Button::widget([
            'options' => $options,
            'label' => $label,
            'encodeLabel' => false,
            'view' => $this->getView(),
        ]);

        return $splitButton ? $button . "\n" . $splitButton : $button;
    }

    /**
     * 渲染菜单项.
     * @return string
     */
    protected function renderDropdown()
    {
        $config = $this->dropdown;
        $config['view'] = $this->getView();
        return Dropdown::widget($config);
    }
}

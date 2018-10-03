<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Button 按钮组样式的复选框组/单选按钮组.
 *
 * @see http://zui.sexy/#control/button/2
 */
class ToggleButtonGroup extends InputWidget
{
    //use ZuiWidgetTrait;  // 此扩展不需要js调用

    /**
     * @var array `div.btn-group` 的 HTML 属性.
     */
    public $options = [];
    /**
     * @var string 控件的类型, 值有:`checkbox`, `radio`;
     */
    public $type = 'checkbox';
    /**
     * @var array 渲染复选框组/单选按钮组的数据项.
     */
    public $items = [];
    /**
     * @var array label(button) 标签的 HTML 属性.
     */
    public $labelOptions = [];
    /**
     * @var bool 项目标签是否 HTML 编码.
     */
    public $encodeLabels = true;


    public function init()
    {
        if($this->hasModel()){
            parent::init();
        }

        Html::addCssClassBefore($this->options, ['widget' => 'btn-group']);
        $this->options['data-toggle'] = 'buttons';
    }

    public function run()
    {
        parent::run();

        if(!isset($this->options['item'])){
            $this->options['item'] = [$this, 'renderItem'];
        }
        if($this->hasModel()){
            switch($this->type){
                case 'checkbox':
                    return Html::activeCheckboxList($this->model, $this->attribute, $this->items, $this->options);
                case 'radio':
                    return Html::activeRadioList($this->model, $this->attribute, $this->items, $this->options);
                default:
                    throw new InvalidConfigException("Unsupported type '{$this->type}'");
            }
        }elseif($this->name){
            if(!ArrayHelper::keyExists('id', $this->options)){
                $this->options['id'] = $this->id . '_' . $this->name;
            }
            switch($this->type){
                case 'checkbox':
                    return Html::checkboxList($this->name, $this->value, $this->items, $this->options);
                case 'radio':
                    return Html::radioList($this->name, $this->value, $this->items, $this->options);
                default:
                    throw new InvalidConfigException("Unsupported type '{$this->type}'");
            }
        }else{
            throw new InvalidConfigException("The 'name' option is required.");
        }
    }

    /**
     * 渲染复选框组/单选按钮组列表项的默认回调.
     * @param int $index
     * @param string $label
     * @param string $name
     * @param bool $checked
     * @param string $value
     * @return mixed
     * @see Html::checkbox()
     * @see Html::radio()
     */
    public function renderItem($index, $label, $name, $checked, $value)
    {
        $labelOptions = $this->labelOptions;
        Html::addCssClassBefore($labelOptions, 'btn');
        if($checked){
            Html::addCssClass($labelOptions, 'active');
        }
        $type = $this->type;
        return Html::$type($name, $checked, [
            'label' => $this->encodeLabels ? Html::encode($label) : $label,
            'labelOptions' => $labelOptions,
            'value' => $value
        ]);
    }
}

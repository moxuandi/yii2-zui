<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Switch 开关.
 *
 * @see http://zui.sexy/#control/switch
 */
class SwitchInput extends InputWidget
{
    //use ZuiWidgetTrait;  // 此扩展不需要js调用

    /**
     * @var array `div.switch`的 HTML 属性.
     */
    public $options = [];
    /**
     * @var array `div.switch > label`的 HTML 属性. 特殊参数:
     * -`label`: string, optional, `label`标签要显示的文本;
     */
    public $labelOptions = [];
    /**
     * @var array `div.switch > input`的 HTML 属性. 特殊参数:
     * -`value`: string, optional, 与复选框的选中状态相关联的值, 默认为`1`;
     * -`uncheck`: string, optional, 与复选框的取消选中状态相关联的值, 默认为`0`;
     */
    public $inputOptions = [];


    public function init()
    {
        Html::addCssClassBefore($this->options, ['widget' => 'switch']);
    }

    public function run()
    {
        parent::run();

        if($this->hasModel()){
            $this->inputOptions['label'] = false;
            $input = Html::activeCheckbox($this->model, $this->attribute, $this->inputOptions);
            $label = Html::activeLabel($this->model, $this->attribute, $this->labelOptions);
        }elseif($this->name){
            if(!ArrayHelper::keyExists('id', $this->inputOptions)){
                $this->inputOptions['id'] = $this->id . '_' . $this->name;
            }
            if(!ArrayHelper::keyExists('value', $this->inputOptions)){
                $this->inputOptions['value'] = 1;
            }
            if(!ArrayHelper::keyExists('uncheck', $this->inputOptions)){
                $this->inputOptions['uncheck'] = 0;
            }
            $checked = $this->value == $this->inputOptions['value'];
            $input = Html::checkbox($this->name, $checked, $this->inputOptions);
            $label = ArrayHelper::remove($this->labelOptions, 'label', $this->name);
            $label = Html::label($label, $this->inputOptions['id'], $this->labelOptions);
        }else{
            throw new InvalidConfigException("The 'name' option is required.");
        }

        return Html::tag('div', $input . $label, $this->options);
    }
}

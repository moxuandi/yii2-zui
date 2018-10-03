<?php
namespace moxuandi\zui;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 ChosenIcons 图标选择插件.
 *
 * @see http://zui.sexy/#javascript/chosen/2
 */
class ChosenIcons extends InputWidget
{
    use ZuiWidgetTrait;

    public $items = [];


    public function init()
    {
        if($this->hasModel()){
            parent::init();
            $value = Html::getAttributeValue($this->model, $this->attribute);
            if(isset($value) && !isset($this->options['data-value'])){
                $this->options['data-value'] = $value;
            }
        }elseif($this->name && !isset($this->options['id'])){
            $this->options['id'] = $this->id .= '_' . $this->name;
            if(isset($this->value) && !isset($this->options['data-value'])){
                $this->options['data-value'] = $this->value;
            }
        }else{
            throw new InvalidConfigException("The 'name' option is required.");
        }

        // 默认值
        $clientOptions = [
            'no_results_text' => '没有找到',  // 当检索时没有找到匹配项时显示的提示文本
            'search_contains' => true,  // 从任意位置开始检索
        ];
        $this->clientOptions = ArrayHelper::merge($clientOptions, $this->clientOptions);
        $this->options = ArrayHelper::merge(['class' => 'form-control'], $this->options);
    }

    public function run()
    {
        parent::run();

        ChosenIconsAsset::register($this->view);
        self::registerPlugin('chosenIcons');

        if($this->hasModel()){
            echo Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
        }else{
            echo Html::dropDownList($this->name, $this->value, $this->items, $this->options);
        }
    }
}

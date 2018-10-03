<?php
namespace moxuandi\zui;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Chosen 插件, 用来增强单选列表和多选列表.
 *
 * @see http://zui.sexy/#javascript/chosen
 */
class Chosen extends InputWidget
{
    use ZuiWidgetTrait;

    public $items = [];


    public function init()
    {
        if($this->hasModel()){
            parent::init();
        }elseif($this->name && !isset($this->options['id'])){
            $this->options['id'] = $this->id .= '_' . $this->name;
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

        ChosenAsset::register($this->view);
        self::registerPlugin('chosen');

        if($this->hasModel()){
            echo Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
        }else{
            echo Html::dropDownList($this->name, $this->value, $this->items, $this->options);
        }
    }
}

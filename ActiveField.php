<?php
namespace moxuandi\zui;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 form 表单输入字段.(未看)
 * 1. 所有输入域配置, 在 [ActiveForm:$fieldConfig] 参数中;
 * 2. 单个输入域配置, 在 [field()] 方法中;
 * 例如:
 * ```php
 * 示例1 - 输入组:
 * $form->field($model, 'demo', [
 *     'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}</div>',
 * ]);
 *
 * 示例2 - 内联复选框/单选按钮:
 * echo $form->field($model, 'demo')->inline()->radioList([10 => '启用', 0 => '禁用']);
 *
 * 示例3 - 静态文本:
 * echo $form->field($model, 'demo')->staticControl();
 * ```
 *
 * @see http://zui.sexy/#view/form
 */
class ActiveField extends \yii\widgets\ActiveField
{
    /**
     * @var bool 渲染 [checkboxList()] 和 [radioList()] 时, 是否使用内联形式. eg:
     * ```php
     * $form->field($model, 'demo')->inline()->radioList([10 => '启用', 0 => '禁用']);  // `inline()`一定要写在前面
     * ```
     */
    public $inline = false;
    /**
     * @var array 渲染模板中`{beginWrapper}`的 HTML 属性. 特殊参数:
     * -`tag`: string, optional, 标签的名称, 默认为:`div`.
     */
    public $wrapperOptions = [];
    /**
     * @var array 渲染模板中`{beginHelp}`的 HTML 属性. 特殊参数:
     * -`tag`: string, optional, 标签的名称, 默认为:`div`.
     */
    public $helpOptions = [];
    /**
     * @var array 水平排列`horizontal`布局时的网络类. 可用的参数:
     * -`label`: array, optional, `{label}`的 css 样式. 默认为:['col-sm-3'];
     * -`wrapper`: array, optional, `{beginWrapper}`的 css 样式. 默认为:['col-sm-6'];
     * -`input`: array, optional, `{input}`的 css 样式. 默认为:[];
     * -`help`: array, optional, `{beginHelp}`的 css 样式. 默认为:['col-sm-3'];
     * -`error`: array, optional, `{error}`的 css 样式. 默认为:[];
     * -`hint`: array, optional, `{hint}`的 css 样式. 默认为:[];
     * -`offset`: array, optional, 不渲染`{label}`时, `{beginWrapper}`的偏移量. 默认为:['col-sm-offset-3'];
     */
    public $horizontalCssClasses = [];
    /**
     * @var string 复选框的渲染模板.
     */
    public $checkboxTemplate = "<div class='checkbox'>\n{beginLabel}{input} {labelTitle}{endLabel}\n</div>\n{hint}\n{error}";
    /**
     * @var string 单选按钮的渲染模板.
     */
    public $radioTemplate = "<div class='radio'>\n{beginLabel}{input} {labelTitle}{endLabel}\n</div>\n{hint}\n{error}";
    /**
     * @var string 水平排列`horizontal`布局中复选框的渲染模板.
     */
    public $horizontalCheckboxTemplate = "{beginWrapper}\n<div class='checkbox'>\n{beginLabel}{input} {labelTitle}{endLabel}\n</div>\n{endWrapper}\n{beginHelp}\n{hint}\n{error}\n{endHelp}";
    /**
     * @var string 水平排列`horizontal`布局中单选按钮的渲染模板.
     */
    public $horizontalRadioTemplate = "{beginWrapper}\n<div class='radio'>\n{beginLabel}{input} {labelTitle}{endLabel}\n</div>\n{endWrapper}\n{beginHelp}\n{hint}\n{error}\n{endHelp}";
    /**
     * @var bool 是否渲染 error 信息. 内联`inline`布局时始终为`false`.
     */
    public $enableError = true;
    /**
     * @var bool 是否渲染 label 标签.
     */
    public $enableLabel = true;
    public $inputTemplate;


    /**
     * @inheritdoc
     */
    public function __construct(array $config = [])
    {
        $layoutConfig = self::createLayoutConfig($config);
        $config = ArrayHelper::merge($layoutConfig, $config);

        parent::__construct($config);
    }

    /**
     * 渲染内联列表.
     * @param bool $value
     * @return $this
     */
    public function inline($value = true)
    {
        $this->inline = (bool)$value;
        return $this;
    }

    /**
     * 渲染静态文本控件.
     * @param array $options
     * -`encode`: boolean, optional, value 值是否 HTML 编码. 默认为`true`;
     * @return $this
     * @see http://zui.sexy/#view/form/7
     */
    public function staticControl($options = [])
    {
        $this->adjustLabelFor($options);
        $this->parts['{input}'] = Html::activeStaticControl($this->model, $this->attribute, $options);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function render($content = null)
    {
        if($content === null){
            if(!isset($this->parts['{beginWrapper}'])){
                $wrapperOptions = $this->wrapperOptions;
                $tag = ArrayHelper::remove($wrapperOptions, 'tag', 'div');
                $this->parts['{beginWrapper}'] = Html::beginTag($tag, $wrapperOptions);
                $this->parts['{endWrapper}'] = Html::endTag($tag);
            }
            if(!isset($this->parts['{beginHelp}'])){
                $helpOptions = $this->helpOptions;
                $tag = ArrayHelper::remove($helpOptions, 'tag', 'div');
                $this->parts['{beginHelp}'] = Html::beginTag($tag, $helpOptions);
                $this->parts['{endHelp}'] = Html::endTag($tag);
            }
            if($this->enableLabel === false){
                $this->parts['{label}'] = '';
                $this->parts['{beginLabel}'] = '';
                $this->parts['{labelTitle}'] = '';
                $this->parts['{endLabel}'] = '';
            }
            if($this->enableError === false){
                $this->parts['{error}'] = '';
            }
            if($this->inputTemplate){
                $input = ArrayHelper::getValue($this->parts, '{input}', Html::activeTextInput($this->model, $this->attribute, $this->inputOptions));
                $this->parts['{input}'] = strtr($this->inputTemplate, ['{input}' => $input]);
            }
        }
        return parent::render($content);
    }

    /**
     * @inheritdoc
     */
    public function checkbox($options = [], $enclosedByLabel = true)
    {
        /*if($enclosedByLabel){
            $this->template = ArrayHelper::remove($options, 'template', $this->form->layout === 'horizontal' ? $this->horizontalCheckboxTemplate : $this->checkboxTemplate);
            if(isset($options['label'])){
                $this->parts['{labelTitle}'] = $options['label'];
            }
            if($this->form->layout === 'horizontal'){
                Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
            }
            $this->labelOptions['class'] = null;
        }
        return parent::checkbox($options, false);*/

        parent::checkbox($options, $enclosedByLabel);
        $this->parts['{input}'] = Html::tag('div', $this->parts['{input}'], ['class' => 'checkbox']);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function radio($options = [], $enclosedByLabel = true)
    {
        /*if($enclosedByLabel){
            $this->template = ArrayHelper::remove($options, 'template', $this->form->layout === 'horizontal' ? $this->horizontalRadioTemplate : $this->radioTemplate);
            if(isset($options['label'])){
                $this->parts['{labelTitle}'] = $options['label'];
            }
            if($this->form->layout === 'horizontal'){
                Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
            }
            $this->labelOptions['class'] = null;
        }
        return parent::radio($options, false);*/

        parent::radio($options, $enclosedByLabel);
        $this->parts['{input}'] = Html::tag('div', $this->parts['{input}'], ['class' => 'radio']);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function checkboxList($items, $options = [])
    {
        if($this->inline){
            if(!isset($options['itemOptions'])){
                $options['itemOptions'] = [
                    'labelOptions' => ['class' => 'checkbox-inline'],
                ];
            }
        }elseif(!isset($options['item'])){
            $itemOptions = ArrayHelper::getValue($options, 'itemOptions', []);
            $options['item'] = function($index, $label, $name, $checked, $value) use ($itemOptions){
                $options = array_merge(['label' => $label, 'value' => $value], $itemOptions);
                return Html::tag('div', Html::checkbox($name, $checked, $options), ['class' => 'checkbox']);
            };
        }
        return parent::checkboxList($items, $options);
    }

    /**
     * @inheritdoc
     */
    public function radioList($items, $options = [])
    {
        if($this->inline){
            if(!isset($options['itemOptions'])){
                $options['itemOptions'] = [
                    'labelOptions' => ['class' => 'radio-inline'],
                ];
            }
        }elseif(!isset($options['item'])){
            $itemOptions = ArrayHelper::getValue($options, 'itemOptions', []);
            $options['item'] = function($index, $label, $name, $checked, $value) use ($itemOptions){
                $options = array_merge(['label' => $label, 'value' => $value], $itemOptions);
                return Html::tag('div', Html::radio($name, $checked, $options), ['class' => 'radio']);
            };
        }
        return parent::radioList($items, $options);
    }

    /**
     * @inheritdoc
     */
    public function label($label = null, $options = [])
    {
        if(is_bool($label)){
            $this->enableLabel = $label;
            if($label === false && $this->form->layout === 'horizontal'){
                Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
            }
        }else{
            $this->enableLabel = true;
            self::renderLabelParts($label, $options);
            parent::label($label, $options);
        }
        return $this;
    }

    /**
     * 该实例的默认配置.
     * @param array $instanceConfig
     * @return array
     */
    protected function createLayoutConfig($instanceConfig)
    {
        // 重置 yii\widgets\ActiveField 中的默认值
        $config = [
            'options' => ['class' => 'form-group'],  // `.form-group`是默认值
            'labelOptions' => ['class' => 'control-label'],  // `.control-label`是默认值, 但 zui 中没有`.control-label`
            'inputOptions' => ['class' => 'form-control'],  // `.form-control`是默认值
            'errorOptions' => ['class' => 'help-block help-block-error'],  // `.help-block`是默认值
            'hintOptions' => ['class' => 'help-block'],  // zui 中没有'hint-block'
        ];

        $layout = $instanceConfig['form']->layout;  // 表单布局类型. `default`(默认), `horizontal`(水平排列的表单), `inline`(内联表单).
        if($layout === 'horizontal'){
            $config['template'] = "{label}\n{beginWrapper}\n{input}\n{endWrapper}\n{beginHelp}\n{hint}\n{error}\n{endHelp}";
            $cssClasses = [
                'label' => ['col-sm-3'],
                'wrapper' => ['col-sm-6'],
                'input' => [],
                'help' => ['col-sm-3'],
                'error' => [],
                'hint' => [],
                'offset' => ['col-sm-offset-3'],  // 不渲染 {label} 时, {beginWrapper} 的偏移量
            ];
            if(isset($instanceConfig['horizontalCssClasses'])){
                $cssClasses = ArrayHelper::merge($cssClasses, $instanceConfig['horizontalCssClasses']);
            }
            $config['horizontalCssClasses'] = $cssClasses;
            Html::addCssClass($config['labelOptions'], $cssClasses['label']);
            Html::addCssClass($config['wrapperOptions'], $cssClasses['wrapper']);
            Html::addCssClass($config['inputOptions'], $cssClasses['input']);
            Html::addCssClass($config['helpOptions'], $cssClasses['help']);
            Html::addCssClass($config['errorOptions'], $cssClasses['error']);
            Html::addCssClass($config['hintOptions'], $cssClasses['hint']);
        }elseif($layout === 'inline'){
            Html::addCssClass($config['labelOptions'], ['only' => 'sr-only']);
            $config['enableError'] = false;
        }

        return $config;
    }

    /**
     * @param string|null $label
     * @param array $options
     */
    protected function renderLabelParts($label = null, $options = [])
    {
        $options = array_merge($this->labelOptions, $options);
        if($label === null){
            $label = ArrayHelper::remove($options, 'label', Html::encode($this->model->getAttributeLabel(Html::getAttributeName($this->attribute))));
        }
        if(!isset($options['for'])){
            $options['for'] = Html::getInputId($this->model, $this->attribute);
        }
        $this->parts['{beginLabel}'] = Html::beginTag('label', $options);
        $this->parts['{endLabel}'] = Html::endTag('label');

        // 这个 if 语句有些困惑
        if(!isset($this->parts['{labelTitle}'])){
            $this->parts['{labelTitle}'] = $label;
        }
    }
}

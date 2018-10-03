<?php
namespace moxuandi\zui;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 ColorPicker 颜色选择器.
 *
 * @see http://zui.sexy/#javascript/colorpicker
 */
class ColorPicker extends InputWidget
{
    //use ZuiWidgetTrait;  // 此扩展暂不支持js调用

    /**
     * @var string 渲染输入域的模板. 必须包含`{input}`.
     */
    public $template = '{input}';


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
        $_options = [
            'class' => 'form-control',
            'data-provide' => 'colorpicker',
        ];
        $this->options = ArrayHelper::merge($_options, $this->options);

        // 转换数组为字符串
        if(isset($this->options['data-colors']) && is_array($this->options['data-colors'])){
            $this->options['data-colors'] = implode(',', $this->options['data-colors']);
        }
    }

    public function run()
    {
        parent::run();

        ColorPickerAsset::register($this->view);
        //self::registerPlugin('colorpicker');  // 此扩展暂不支持js调用

        $type = ArrayHelper::getValue($this->options, 'type', 'text');
        echo strtr($this->template, ['{input}' => self::renderInputHtml($type)]);
    }
}

<?php
namespace moxuandi\zui;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 DateTimePicker 日期时间选择器.
 *
 * @see http://zui.sexy/#javascript/datetimepicker
 */
class DateTimePicker extends InputWidget
{
    use ZuiWidgetTrait;

    /**
     * @var string|null 日期时间格式.
     * 如果不为`null`, 则将使用`date()`函数对`value`值进行转换; 如果为`null`, 则`value`值将不变.
     * 换句话说, 如果`value`值是日期时间字符串, 则该属性必须设置为`null`; 如果`value`值是时间戳(包括字符串类型的时间戳), 则该属性必须不为`null`.
     */
    public $phpFormat = 'Y-m-d';


    public function init()
    {
        if($this->hasModel()){
            parent::init();
            if($this->phpFormat !== null){
                $this->options['value'] = date($this->phpFormat, Html::getAttributeValue($this->model, $this->attribute));
            }
        }elseif($this->name){
            if(!isset($this->options['id'])){
                $this->options['id'] = $this->id .= '_' . $this->name;
            }
            if($this->phpFormat !== null){
                $this->value = date($this->phpFormat, $this->value);
            }
        }else{
            throw new InvalidConfigException("The 'name' option is required.");
        }

        // 默认值
        $clientOptions = [
            'autoclose' => true,  // 自动关闭
            'todayBtn' => true,  // 底部显示"今天"按钮
            'todayHighlight' => true,  // 突出显示当前日期
            'minView' => 2,  // 视图样式, 0: 选择时间, 2: 选择日期
            'format' => 'yyyy-mm-dd',  // 日期格式
        ];
        $this->clientOptions = ArrayHelper::merge($clientOptions, $this->clientOptions);
        $this->options = ArrayHelper::merge(['class' => 'form-control'], $this->options);
    }

    public function run()
    {
        parent::run();

        DateTimePickerAsset::register($this->view);
        self::registerPlugin('datetimepicker');

        $type = ArrayHelper::getValue($this->options, 'type', 'text');
        echo $this->renderInputHtml($type);
    }
}

<?php
namespace moxuandi\zui;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Html 助手类.
 */
class Html extends \yii\helpers\Html
{
    /**
     * 渲染一个 ZUI icon 图标.
     * @param string $name 图标的名称.
     * @param array $options 图标的 HTML 属性(name-value 对), 特殊选项如下:
     * - `tag`: string, optional, 图标使用的 HTML 标签名称, 默认:`i`.
     * - `prefix`: string, optional, 图标名称的前缀, 默认:`icon icon-`.
     * @return string 渲染的图标
     * @see http://zui.sexy/#control/icon
     * @see docs/control-icon.md
     */
    public static function icon($name, $options = [])
    {
        $tag = ArrayHelper::remove($options, 'tag', 'i');
        $classPrefix = ArrayHelper::remove($options, 'prefix', 'icon icon-');
        self::addCssClassBefore($options, $classPrefix . $name);
        return self::tag($tag, '', $options);
    }

    /**
     * 生成一个静态文本控件.
     * @param string $value
     * @param array $options 特殊可用参数:
     * -`encode`: boolean, optional, value 值是否 HTML 编码. 默认为`true`;
     * @return string
     * @see http://zui.sexy/#view/form/7
     */
    public static function staticControl($value, $options = [])
    {
        static::addCssClassBefore($options, 'form-control-static');
        $value = (string)$value;
        return static::tag('p', ArrayHelper::remove($options, 'encode', true) ? static::encode($value) : $value, $options);
    }

    /**
     * 为给定的模型属性生成一个静态文本控件.
     * @param \yii\base\Model $model
     * @param string $attribute
     * @param array $options
     * -`encode`: boolean, optional, value 值是否 HTML 编码. 默认为`true`;
     * @return string
     * @see http://zui.sexy/#view/form/7
     */
    public static function activeStaticControl($model, $attribute, $options = [])
    {
        $value = ArrayHelper::remove($options, 'value', static::getAttributeValue($model, $attribute));
        return static::staticControl($value, $options);
    }

    /**
     * 重写 [[yii\helpers\Html::addCssClass()]].
     * @param array $options
     * @param string|array $class
     */
    public static function addCssClassBefore(&$options, $class)
    {
        if(isset($options['class'])){
            if(is_array($options['class'])){
                $options['class'] = self::mergeCssClassesBefore($options['class'], (array)$class);
            }else{
                $classes = preg_split('/\s+/', $options['class'], -1, PREG_SPLIT_NO_EMPTY);
                $options['class'] = implode(' ', self::mergeCssClassesBefore($classes, (array)$class));
            }
        }else{
            $options['class'] = $class;
        }
    }

    /**
     * 重写 [[yii\helpers\Html::mergeCssClasses()]].
     * @param array $existingClasses
     * @param array $additionalClasses
     * @return array
     */
    private static function mergeCssClassesBefore(array $existingClasses, array $additionalClasses)
    {
        return array_unique(ArrayHelper::merge($additionalClasses, $existingClasses));
    }
}

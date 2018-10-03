<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;

/**
 * 渲染一个 form 表单.(未看)
 * 例如:
 * ```php
 * 示例1 - 基本形式:
 * $form = ActiveForm::begin();
 * ActiveForm::end();
 *
 * 示例2 - 水平排列的表单:
 * $form = ActiveForm::begin(['layout' => 'horizontal']);
 * ActiveForm::end();
 *
 * 示例3 - 内联表单:
 * $form = ActiveForm::begin(['layout' => 'inline']);
 * ActiveForm::end();
 *
 * 示例4 - 更为紧凑的表单:
 * $form = ActiveForm::begin(['options' => ['class' => 'form-condensed']]);
 * ActiveForm::end();
 * ```
 * 2. 水平排列的表单: `.form-horizontal`;
 * 3. 内联表单: `.form-inline`;
 * 4. 更为紧凑的表单: `.form-condensed`, 可与`.form-horizontal`同时使用;
 *
 * @see http://zui.sexy/#view/form
 */
class ActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * @var string 表单布局类型. `default`(默认), `horizontal`(水平排列的表单), `inline`(内联表单).
     */
    public $layout = 'default';
    /**
     * @var string 调用 [[field()]] 方法创建 form 字段时的默认类名称.
     */
    public $fieldClass = 'moxuandi\zui\ActiveField';


    public function init()
    {
        if(!in_array($this->layout, ['default', 'horizontal', 'inline'])){
            throw new InvalidConfigException("Invalid layout type: " . $this->layout);
        }

        if($this->layout !== 'default'){
            Html::addCssClassBefore($this->options, 'form-' . $this->layout);
        }

        parent::init();
    }
}

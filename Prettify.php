<?php
namespace moxuandi\zui;

use Yii;

/**
 * 渲染一个代码高亮片段.
 *
 * @see http://zui.sexy/#component/code/3
 */
class Prettify extends Widget
{
    /**
     * @var array `pre`标签的 HTML 属性.
     */
    public $options = [];
    /**
     * @var string 要高亮的代码内容.
     */
    public $content;
    /**
     * @var bool 是否为`pre`标签添加`.linenums`.
     */
    public $linenums = false;


    public function init()
    {
        parent::init();

        if($this->linenums){
            Html::addCssClassBefore($this->options, ['linenums']);
        }
        Html::addCssClassBefore($this->options, ['widget' => 'prettyprint']);
    }

    public function run()
    {
        parent::run();

        PrettifyAsset::register($this->view);  // 需要独立组件 lib/prettify/prettify.js 支持
        $this->view->registerJs('window.prettyPrint();', \yii\web\View::POS_END);

        return Html::tag('pre', "<code>$this->content</code>", $this->options);
    }
}

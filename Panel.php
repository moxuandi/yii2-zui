<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Panel 面板.
 *
 * @see http://zui.sexy/#component/panel
 */
class Panel extends Widget
{
    /**
     * @var array `div.panel`的 HTML 属性.
     */
    public $options = [];
    /**
     * @var string 面板的标题内容.
     */
    public $header;
    /**
     * @var string|array|object 面板的主体内容.
     */
    public $content;
    /**
     * @var string 面板的脚注内容.
     */
    public $footer;
    /**
     * @var array 标题部分(`div.panel-heading`)的 HTML 属性
     */
    public $headerOptions = [];
    /**
     * @var array 主体部分(`div.panel-body`或`div.list-group`)的 HTML 属性
     */
    public $contentOptions = [];
    /**
     * @var array 脚注部分(`div.panel-footer`)的 HTML 属性
     */
    public $footerOptions = [];
    /**
     * @var string 面板内容的模板, 可用变量: `{header}`, `{content}`, `{footer}`.
     */
    public $template = "{header}\n{content}\n{footer}";


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'panel']);
    }

    public function run()
    {
        parent::run();

        ZuiAsset::register($this->getView());  // 需要 css 支持

        return implode("\n", [
            Html::beginTag('div', $this->options),
            self::renderPanel(),
            Html::endTag('div')
        ]);
        //return Html::tag('div', self::renderPanel(), $this->options);
    }

    /**
     * 渲染一个面板
     * @return mixed
     * @throws InvalidConfigException `content`类型不符合要求.
     */
    protected function renderPanel()
    {
        $header = $content = $footer = '';

        if(strpos($this->template, '{header}') !== false && $this->header){
            Html::addCssClassBefore($this->headerOptions, ['widget' => 'panel-heading']);
            $header = Html::tag('div', $this->header, $this->headerOptions);
        }

        if(strpos($this->template, '{content}') !== false){
            if(is_string($this->content) || is_object($this->content)){
                Html::addCssClassBefore($this->contentOptions, ['widget' => 'panel-body']);
                $content = Html::tag('div', $this->content, $this->contentOptions);
            }elseif(is_array($this->content)){
                Html::addCssClassBefore($this->contentOptions, ['widget' => 'list-group']);
                $content = Html::ul($this->content, ArrayHelper::merge($this->contentOptions, ['itemOptions' => ['class' => 'list-group-item'], 'encode' => false]));
            }else{
                throw new InvalidConfigException("The 'content' option should be a string, array or object.");
            }
        }

        if(strpos($this->template, '{footer}') !== false && $this->footer){
            Html::addCssClassBefore($this->footerOptions, ['widget' => 'panel-footer']);
            $footer = Html::tag('div', $this->footer, $this->footerOptions);
        }

        return str_replace(['{header}', '{content}', '{footer}'], [$header, $content, $footer], $this->template);
    }
}

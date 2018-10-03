<?php
namespace moxuandi\zui;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Nav 导航.
 *
 * @see http://zui.sexy/#component/navbar
 */
class NavBar extends Widget
{
    /**
     * @var array `nav.navbar`的 HTML 属性, 特殊可用参数:
     * -`tag`: string, optional, 标签名称, 默认为`nav`;
     */
    public $options = [];
    /**
     * @var array 导航项目(`div.collapse`)的 HTML 属性, 特殊可用参数:
     * -`tag`: string, optional, 标签名称, 默认为`div`;
     */
    public $containerOptions = [];
    /**
     * @var array 导航头部(`div.navbar-header`)的 HTML 属性.
     */
    public $navbarHeaderOptions = [];
    /**
     * @var array 移动设备上的导航切换按钮(`div.navbar-header > button.navbar-toggle`)的 HTML 属性.
     */
    public $navbarToggleOptions = [];
    /**
     * @var string 移动设备上的导航切换按钮(`div.navbar-header > button.navbar-toggle > span.sr-only`)的文本内容.
     */
    public $screenReaderToggleText = 'Toggle navigation';
    /**
     * @var string|bool 品牌名称或LOGO(`a.navbar-brand`)的文本内容.
     */
    public $brandLabel = false;
    /**
     * @var array|string|bool 品牌名称或LOGO(`a.navbar-brand`)的链接URL.
     */
    public $brandUrl = false;
    /**
     * @var array 品牌名称或LOGO(`a.navbar-brand`)的 HTML 属性
     */
    public $brandOptions = [];
    /**
     * @var bool 是否渲染`nav > div.container`.
     */
    public $renderInnerContainer = true;
    /**
     * @var array `nav > div.container`的 HTML 属性.
     */
    public $innerContainerOptions = [];


    public function init()
    {
        parent::init();

        if(!isset($this->options['id'])){
            $this->options['id'] = $this->id;
        }
        if(!isset($this->containerOptions['id'])){
            $this->containerOptions['id'] = $this->options['id'] . '-collapse';
        }

        // 渲染`nav.navbar`
        Html::addCssClassBefore($this->options, ['widget' => 'navbar']);
        $this->options['role'] = 'navigation';  // ZUI 示例中存在该属性
        $options = $this->options;
        echo Html::beginTag(ArrayHelper::remove($options, 'tag', 'nav'), $options) . "\n";

        // 渲染`nav > div.container`
        if($this->renderInnerContainer){
            if(empty($this->innerContainerOptions['class'])){
                Html::addCssClassBefore($this->innerContainerOptions, 'container');
            }
            echo Html::beginTag('div', $this->innerContainerOptions) . "\n";
        }

        // 渲染导航头部`div.navbar-header`
        Html::addCssClassBefore($this->navbarHeaderOptions, ['widget' => 'navbar-header']);
        echo Html::beginTag('div', $this->navbarHeaderOptions) . "\n";
        echo self::renderToggleButton() . "\n";
        if($this->brandLabel !== false){
            Html::addCssClassBefore($this->brandOptions, ['widget' => 'navbar-brand']);
            echo Html::a($this->brandLabel, $this->brandUrl === false ? Yii::$app->homeUrl : $this->brandUrl, $this->brandOptions) . "\n";
        }
        echo Html::endTag('div') . "\n";

        // 渲染导航项目(`div.collapse`)
        Html::addCssClassBefore($this->containerOptions, ['collapse' => 'collapse', 'widget' => 'navbar-collapse']);
        $containerOptions = $this->containerOptions;
        echo Html::beginTag(ArrayHelper::remove($containerOptions, 'tag', 'div'), $containerOptions) . "\n";
    }

    public function run()
    {
        parent::run();

        // 渲染导航项目(`div.collapse`)的结束标签
        echo "\n" . Html::endTag(ArrayHelper::remove($this->containerOptions, 'tag', 'div')) . "\n";

        // 渲染`nav > div.container`的结束标签
        if($this->renderInnerContainer){
            echo Html::endTag('div') . "\n";
        }

        // 渲染`nav.navbar`的结束标签
        echo Html::endTag(ArrayHelper::remove($this->options, 'tag', 'nav'));

        ZuiAsset::register($this->getView());  // 需要 css 支持
    }

    /**
     * 渲染移动设备上的导航切换按钮(`div.navbar-header > button`).
     * @return string
     */
    protected function renderToggleButton()
    {
        $bar = Html::tag('span', '', ['class' => 'icon-bar']);
        $screenReader = '<span class="sr-only">' . $this->screenReaderToggleText . '</span>';

        Html::addCssClassBefore($this->navbarToggleOptions, ['widget' => 'navbar-toggle']);
        $this->navbarToggleOptions['data-toggle'] = 'collapse';
        $this->navbarToggleOptions['data-target'] = '#' . $this->containerOptions['id'];
        return Html::button("\n{$screenReader}\n{$bar}\n{$bar}\n{$bar}\n", $this->navbarToggleOptions);
    }
}

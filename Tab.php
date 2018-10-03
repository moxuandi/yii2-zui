<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Tab 标签页.
 *
 * @see http://zui.sexy/#javascript/tab
 */
class Tab extends ZuiWidget
{
    /**
     * @var array 参数继承. 标签页标题`ul.nav-tabs`的 HTML 属性.
     */
    public $options = [];
    /**
     * @var array 标签页元素列表. 每个数组元素表示一个标签页对象, 且应具有以下结构:
     * -`label`: string, required, 标签页的标题(`ul.nav-tabs > li > a`);
     * -`content`: string, optional, 标签页的内容(`div.tab-content > .tab-pane`);
     * -`url`: string|array, optional, 外部URL, 点击该标签页时浏览器将跳转到这个外部URL;
     * -`options`: array, optional, 标签页标题(`ul.nav-tabs > li`)的 HTML 属性, 默认为`$headerOptions`;
     * -`linkOptions`: array, optional, 标签页标题(`ul.nav-tabs > li > a`)的 HTML 属性;
     * -`paneOptions`: array, optional, 标签页内容(`div.tab-content > .tab-pane`)的 HTML 属性, 默认为`$tabPaneOptions`;
     * -`encode`: string, optional, 标签页的标题是否 HTML 编码, 默认为`$encodeLabels`;
     * -`visible`: string, optional, 该标签页是否显示(不显示则不渲染), 默认为`true`;
     * -`active`: string, optional, 该标签页是否活动(活动标签页会在初始化时添加`active`), 默认为`false`;
     * -`items`: array, optional, 子标签页;
     */
    public $items = [];
    /**
     * @var array 标签页标题`ul.nav-tabs > li`的 HTML 属性(统一配置).
     */
    public $headerOptions = [];
    /**
     * @var array 标签页标题`ul.nav-tabs > li > a`的 HTML 属性(统一配置).
     */
    public $linkOptions = [];
    /**
     * @var array 标签页内容`div.tab-content`的 HTML 属性.
     */
    public $tabContentOptions = [];
    /**
     * @var array 标签页内容`div.tab-content > div.tab-pane`的 HTML 属性(统一配置).
     * 替换 $itemOptions
     */
    public $tabPaneOptions = [];
    /**
     * @var bool 标签页标题的内容是否 HTML 编码.
     */
    public $encodeLabels = true;
    /**
     * @var bool 是否启用动画效果.
     */
    public $fade = true;
    /**
     * @var array 三角图标:
     */
    public $caret = '<span class="caret"></span>';
    /**
     * @var string 标签页的模板, 可用变量: `{tab}`, `{content}`.
     */
    public $template = "{tab}\n{content}";


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['nav' => 'nav', 'widget' => 'nav-tabs']);
        Html::addCssClassBefore($this->tabContentOptions, ['widget' => 'tab-content']);
    }

    public function run()
    {
        parent::run();

        $this->registerPlugin('tab');

        return self::renderItems();
    }

    /**
     * 渲染标签页.
     * @return string
     * @throws InvalidConfigException `label`未设置.
     */
    protected function renderItems()
    {
        $headers = $panes = [];

        if(!self::hasActiveTab($this->items)){
            self::activateFirstVisibleTab();
        }

        foreach($this->items as $n => $item){
            if(!ArrayHelper::remove($item, 'visible', true)){
                continue;
            }

            //if(!array_key_exists('label', $item)){}
            if(!ArrayHelper::keyExists('label', $item)){
                throw new InvalidConfigException("The 'label' option is required.");
            }

            $label = ArrayHelper::remove($item, 'encode', $this->encodeLabels) ? Html::encode($item['label']) : $item['label'];
            $headerOptions = array_merge($this->headerOptions, ArrayHelper::getValue($item, 'options', []));
            $linkOptions = array_merge($this->linkOptions, ArrayHelper::getValue($item, 'linkOptions', []));

            if(ArrayHelper::keyExists('items', $item)){
                $label .= ' ' . $this->caret;
                Html::addCssClass($headerOptions, ['widget' => 'dropdown']);
                Html::addCssClass($linkOptions, ['widget' => 'dropdown-toggle']);
                $linkOptions['data-toggle'] = 'dropdown';

                if(self::renderDropdown($n, $item['items'], $panes)){
                    Html::addCssClass($headerOptions, ['active' => 'active']);
                }

                $headers[] = implode("\n", [
                    Html::beginTag('li', $headerOptions),
                    Html::a($label, '#', $linkOptions),
                    Dropdown::widget(['items' => $item['items'], 'view' => $this->getView()]),
                    Html::endTag('li')
                ]);
            }else{
                $tabPaneOptions = array_merge($this->tabPaneOptions, ArrayHelper::remove($item, 'paneOptions', []));
                $tabPaneOptions['id'] = ArrayHelper::getValue($tabPaneOptions, 'id', $this->options['id'] . '-tab-' . $n);
                Html::addCssClassBefore($tabPaneOptions, ['widget' => 'tab-pane']);
                $active = ArrayHelper::remove($item, 'active', false);
                if($active){
                    Html::addCssClass($tabPaneOptions, ['active' => 'active']);
                    Html::addCssClass($headerOptions, ['active' => 'active']);
                }
                if($this->fade){
                    Html::addCssClass($tabPaneOptions, ['fade' => 'fade']);
                    if($active){
                        Html::addCssClass($tabPaneOptions, ['in' => 'in']);
                    }
                }

                if(ArrayHelper::keyExists('url', $item)){
                    $headers[] = Html::tag('li', Html::a($label, ArrayHelper::remove($item, 'url'), $linkOptions), $headerOptions);
                }else{
                    $linkOptions['data-toggle'] = 'tab';
                    $headers[] = Html::tag('li', Html::a($label, '#' . $tabPaneOptions['id'], $linkOptions), $headerOptions);
                    $panes[] = Html::tag('div', ArrayHelper::remove($item, 'content', ''), $tabPaneOptions);
                }
            }
        }

        $tabLists = implode("\n", [
            Html::beginTag('ul', $this->options),
            implode("\n", $headers),
            Html::endTag('ul')
        ]);
        $paneLists = implode("\n", [
            Html::beginTag('div', $this->tabContentOptions),
            implode("\n", $panes),
            Html::endTag('div')
        ]);

        return str_replace(['{tab}', '{content}'], [$tabLists, $paneLists], $this->template);
    }

    /**
     * 渲染下拉列表及下拉标签对应`tab-pane`的内容.
     * @param int $itemNumber
     * @param array $items
     * @param array $panes
     * @return bool 下拉列表是否有活动项(如果有, 则激活父项).
     */
    protected function renderDropdown($itemNumber, &$items, &$panes)
    {
        $itemActive = false;

        foreach($items as $n => &$item){
            if(is_string($item)){
                continue;
            }

            //if(isset($item['visible']) && !$item['visible']){}
            if(!ArrayHelper::remove($item, 'visible', true)){
                continue;
            }

            //if(array_key_exists('url', $item)){}
            if(ArrayHelper::keyExists('url', $item)){
                continue;
            }

            $tabPaneOptions = array_merge($this->tabPaneOptions, ArrayHelper::remove($item, 'paneOptions', []));
            $tabPaneOptions['id'] = ArrayHelper::getValue($tabPaneOptions, 'id', $this->options['id'] . '-tab-' . $itemNumber . '-dd-' . $n);
            Html::addCssClassBefore($tabPaneOptions, ['widget' => 'tab-pane']);
            $active = ArrayHelper::remove($item, 'active', false);
            if($active){
                Html::addCssClass($tabPaneOptions, ['active' => 'active']);
                Html::addCssClass($item['options'], ['active' => 'active']);
                $itemActive = true;
            }
            if($this->fade){
                Html::addCssClass($tabPaneOptions, ['fade' => 'fade']);
                if($active){
                    Html::addCssClass($tabPaneOptions, ['in' => 'in']);
                }
            }

            $item['url'] = '#' . $tabPaneOptions['id'];
            $item['linkOptions']['data-toggle'] = 'tab';
            $panes[] = Html::tag('div', ArrayHelper::remove($item, 'content', ''), $tabPaneOptions);

            unset($item);
        }

        return $itemActive;
    }

    /**
     * 遍历标签页列表, 判断是否后活动标签页.
     * @param array $items
     * @return bool
     */
    protected function hasActiveTab($items)
    {
        foreach($items as $item){
            // 如果有子标签页, 则递归遍历
            if(ArrayHelper::keyExists('items', $item)){
                return self::hasActiveTab($item['items']);
            }
            //if(isset($item['active']) && $item['active'] === true){}
            if(ArrayHelper::getValue($item, 'active', false)){
                return true;
            }
        }
        return false;
    }

    /**
     * 当没有任何活动标签页时, 将第一个`visible=true`的标签页设置为活动`active`.
     * 遍历将忽略数组元素.
     */
    protected function activateFirstVisibleTab()
    {
        foreach($this->items as $n => $item){
            if(ArrayHelper::getValue($item, 'active', false) === false && ArrayHelper::getValue($item, 'visible', true)){
                $this->items[$n]['active'] = true;
                return;
            }
        }
    }
}

<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个基于 Panel 面板的 Collapse 折叠.
 *
 * @see http://zui.sexy/#javascript/collapse
 */
class CollapsePanel extends Widget
{
    /**
     * @var array 最外层的 HTML 属性.
     */
    public $options = [];
    /**
     * @var array 折叠元素列表. 每个数组元素表示一个折叠元素(也是一个 Panel 面板), 且应具有以下结构:
     * -`label`: string, required, 折叠元素的标题;
     * -`content`: string|array|object, required, 折叠元素的内容(值为array时, 参考 [ListGroup::$items]);
     * -`footer`: string, optional, 折叠元素脚注部分的内容;
     * -`options`: array, optional, 折叠元素 Panel 面板(`div.panel`)的 HTML 属性;
     * -`headerOptions`: array, optional, 折叠元素标题(`div.panel-heading`)的 HTML 属性;
     * -`headerTitleOptions`: array, optional, 折叠元素标题(`div.panel-title`)的 HTML 属性;
     * -----`tag`: string, optional, 折叠元素标题的标签名称, 默认为`h4`;
     * -`headerLinkOptions`: array, optional, 折叠元素标题链接(`div.collapse-toggle`)的 HTML 属性;
     * -`panelCollapseOptions`: array, optional, 折叠元素内容和脚注包裹层(`div.panel-collapse`)的 HTML 属性;
     * -`contentOptions`: array, optional, 折叠元素内容(`div.panel-body`或`ul.list-group`)的 HTML 属性;
     * -`footerOptions`: array, optional, 折叠元素脚注(`div.panel-footer`)的 HTML 属性;
     * -`encode`: bool, optional, 折叠元素的标题是否 HTML 编码, 默认为`$encodeLabel`;
     * -`active`: bool, optional, 该折叠元素在初始化时是否显示, 默认为`false`;
     * -`visible`: bool, optional, 该折叠元素是否显示(不显示则不渲染), 默认为`true`;
     */
    public $items = [];
    /**
     * @var bool 折叠元素的标题是否 HTML 编码.
     */
    public $encodeLabel = true;
    /**
     * @var bool 当一个项目被打开时, 是否关闭其他项目(手风琴效果), 默认为`true`.
     * 设置为`false`时, 允许同时打开多个项目.
     */
    public $autoCloseItems = true;


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'panel-group']);

        if(!isset($this->options['id'])){
            $this->options['id'] = $this->id;
        }
    }

    public function run()
    {
        parent::run();

        ZuiPluginAsset::register($this->getView());  // 需要 js 支持

        return implode("\n", [
            Html::beginTag('div', $this->options),
            self::renderItems(),
            Html::endTag('div')
        ]);
        //return Html::tag('div', self::renderItems(), $this->options);
    }

    /**
     * 渲染折叠元素.
     * @return string
     * @throws InvalidConfigException `label`未设置.
     */
    protected function renderItems()
    {
        $items = [];
        $index = 0;
        foreach($this->items as $key => $item){
            //if(isset($item['visible']) && !$item['visible']){}
            if(!ArrayHelper::remove($item, 'visible', true)){
                continue;
            }

            if(!is_array($item)){
                $item = ['content' => $item];
            }

            //if(!array_key_exists('label', $item)){}
            if(!ArrayHelper::keyExists('label', $item)){
                if(is_int($key)){
                    throw new InvalidConfigException("The 'label' option is required.");
                }else{
                    $item['label'] = $key;
                }
            }

            $options = ArrayHelper::getValue($item, 'options', []);
            Html::addCssClassBefore($options, ['panel' => 'panel']);

            $items[] = implode("\n", [
                Html::beginTag('div', $options),
                self::renderItem($item, ++$index),
                Html::endTag('div')
            ]);
            //$items[] = Html::tag('div', self::renderItem($item, ++$index), $options);
        }

        return implode("\n", $items);
    }

    /**
     * 渲染一个折叠元素.
     * @param array $item 折叠元素配置项.
     * @param int $index 折叠元素的序号.
     * @return string
     * @throws InvalidConfigException `content`未设置或类型不符合要求.
     */
    protected function renderItem($item, $index)
    {
        //if(!array_key_exists('content', $item)){}
        if(!ArrayHelper::keyExists('content', $item)){
            throw new InvalidConfigException("The 'content' option is required.");
        }

        $panelCollapseOptions = ArrayHelper::getValue($item, 'panelCollapseOptions', []);
        $id = ArrayHelper::remove($panelCollapseOptions, 'id', $this->options['id'] . '-collapse-' . $index);
        $panelCollapseOptions['id'] = $id;

        // 渲染折叠元素标题的链接部分
        $headerLinkOptions = ArrayHelper::getValue($item, 'headerLinkOptions', []);
        Html::addCssClassBefore($headerLinkOptions, ['widget' => 'collapse-toggle']);
        $headerLinkOptions['data-toggle'] = 'collapse';
        if($this->autoCloseItems){
            $headerLinkOptions['data-parent'] = '#' . $this->options['id'];
        }
        $headerLink = Html::a(ArrayHelper::getValue($item, 'encode', $this->encodeLabel) ? Html::encode($item['label']) : $item['label'], '#' . $id, $headerLinkOptions);

        // 渲染折叠元素标题部分(链接的父元素`h4.panel-title`)
        $headerTitleOptions = ArrayHelper::getValue($item, 'headerTitleOptions', []);
        Html::addCssClassBefore($headerTitleOptions, ['widget' => 'panel-title']);
        $headerTitle = Html::tag(ArrayHelper::remove($headerTitleOptions, 'tag', 'h4'), $headerLink, $headerTitleOptions);

        // 渲染折叠元素标题
        $headerOptions = ArrayHelper::getValue($item, 'headerOptions', []);
        Html::addCssClassBefore($headerOptions, ['widget' => 'panel-heading']);
        $header = implode("\n", [
            Html::beginTag('div', $headerOptions),
            $headerTitle,
            Html::endTag('div')
        ]);
        //$header = Html::tag('div', $headerTitle, $headerOptions);

        // 渲染折叠元素内容
        $contentOptions = ArrayHelper::getValue($item, 'contentOptions', []);
        if(is_string($item['content']) || is_numeric($item['content']) || is_object($item['content'])){
            Html::addCssClassBefore($contentOptions, ['widget' => 'panel-body']);
            $content = Html::tag('div', $item['content'], $contentOptions);
        }elseif(is_array($item['content'])){
            $listItems = [];
            foreach($item['content'] as $item){
                $listItems[] = is_string($item) ? ['label' => $item] : $item;
            }
            $content = ListGroup::widget([
                'items' => $listItems,
                'options' => $contentOptions
            ]);
        }else{
            throw new InvalidConfigException("The 'content' option should be a string, array or object.");
        }

        // 渲染折叠元素脚注
        if(isset($item['footer'])){
            $footerOptions = ArrayHelper::getValue($item, 'footerOptions', []);
            Html::addCssClassBefore($footerOptions, ['widget' => 'panel-footer']);
            $content .= "\n" . Html::tag('div', $item['footer'], $footerOptions);
        }

        // 渲染折叠元素内容(内容和脚注的父元素`div.panel-collapse`)
        if(ArrayHelper::getValue($item, 'active', false)){
            Html::addCssClassBefore($panelCollapseOptions, ['in' => 'in']);
        }
        Html::addCssClassBefore($panelCollapseOptions, ['widget' => 'panel-collapse', 'collapse' => 'collapse']);

        $panelCollapse = implode("\n", [
            Html::beginTag('div', $panelCollapseOptions),
            $content,
            Html::endTag('div')
        ]);
        //$panelCollapse = Html::tag('div', $content, $panelCollapseOptions);

        return implode("\n", [$header, $panelCollapse]);
    }
}

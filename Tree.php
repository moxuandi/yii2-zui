<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Tree 树形菜单.
 *
 * @see http://zui.sexy/#view/tree
 */
class Tree extends Widget
{
    /**
     * @var `ul.tree`的 HTML 属性. 特殊参数:
     * -`data-ride`: `'tree'`, required;
     * -`data-animate`: bool, optional, 是否启用动画效果, 默认为`false`;
     * -`data-initial-state`: string, optional, 初始状态. 可用值:
     * -----`normal`: 自动根据dom结构决定(默认);
     * -----`expand`: 全部展开;
     * -----`collapse`: 全部折叠;
     * -----`preserve`: 从本地存储还原用户上次操作状态;
     * -`data-toggle-template`: 默认为`'<i class="list-toggle icon"></i>'`;
     * -`data-sortable`: 默认为`false`;
     * -`data-data`:;
     * -`data-item-creator`:;
     * -`data-item-wrapper`:;
     */
    public $options = [];
    /**
     * @var array 菜单元素列表. 每个数组元素表示一个菜单项, 且应具有以下结构:
     * -`label`: string, required, 菜单项的标题;
     * -`url`: string|array, optional, 菜单项的链接地址, 默认为`#`;
     * -`options`: array, optional, 菜单项(`ul.tree > li`)的 HTML 属性;
     * -`linkOptions`: array, optional, 菜单项链接(`ul.tree > li > a`)的 HTML 属性;
     * -`encode`: bool, optional, 菜单项的标题是否 HTML 编码, 默认为`$encodeLabel`;
     * -`open`: bool, optional, 该菜单项在初始化时是否展开, 默认为`false`;
     * -`visible`: bool, optional, 该菜单项是否显示(不显示则不渲染), 默认为`true`;
     * -`items`: array, optional, 子菜单项列表;
     */
    public $items = [];
    /**
     * @var bool 菜单标题是否 HTML 编码.
     */
    public $encodeLabels = true;
    /**
     * @var bool 当子菜单项是展开状态时, 是否展开相应的父菜单项.
     */
    public $openParents = true;
    /**
     * @var string 有子菜单时, 给父菜单添加的图标内容.
     */
    public $listToggles = "<i class='list-toggle icon'></i>";


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'tree']);
        $this->options['data-ride'] = 'tree';

        if(!isset($this->options['id'])){
            $this->options['id'] = $this->id;
        }
    }

    public function run()
    {
        parent::run();

        ZuiPluginAsset::register($this->getView());  // 需要 js 支持

        return self::renderItems($this->items, $this->options);
    }

    /**
     * 渲染树形菜单.
     * @param array $items
     * @param array $options
     * @return string
     */
    protected function renderItems($items, $options = [])
    {
        $lines = [];
        foreach($items as $item){
            //if(isset($item['visible']) && !$item['visible']){}
            if(!ArrayHelper::remove($item, 'visible', true)){
                continue;
            }
            $lines[] = self::renderItem($item);
        }

        return implode("\n", [
            Html::beginTag('ul', $options),
            implode("\n", $lines),
            Html::endTag('ul')
        ]);
        //return Html::tag('ul', implode("\n", $lines), $options);
    }

    /**
     * 渲染菜单项.
     * @param array $item
     * @return string
     * @throws InvalidConfigException `label`未设置.
     */
    protected function renderItem($item)
    {
        if(is_string($item)){
            return $item;
        }

        if(!isset($item['label'])){
            throw new InvalidConfigException("The 'label' option is required.");
        }

        $label = ArrayHelper::getValue($item, 'encode', $this->encodeLabels) ? Html::encode($item['label']) : $item['label'];
        $url = ArrayHelper::getValue($item, 'url', '#');
        $options = ArrayHelper::getValue($item, 'options', []);
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
        $open = ArrayHelper::getValue($item, 'open', false);
        $items = ArrayHelper::getValue($item, 'items');

        $link = Html::a($label, $url, $linkOptions);
        if(empty($items)){
            $items = '';
        }elseif(is_array($items)){
            Html::addCssClassBefore($options, ['list' => 'has-list']);
            $link = "\n" . $this->listToggles . $link . "\n";
            $items = self::isChildOpen($items, $open);
            $items = self::renderItems($items) . "\n";
        }

        if($open){
            Html::addCssClass($options, ['open' => 'open', 'in' => 'in']);
        }

        return Html::tag('li', $link . $items, $options);
    }

    /**
     * 检查子菜单项是否处于展开状态, 以判断是否激活父菜单项.
     * @param array $items
     * @param bool $open
     * @return mixed
     */
    protected function isChildOpen($items, &$open)
    {
        foreach($items as $i => $child){
            if(is_array($child) && !ArrayHelper::getValue($child, 'visible', true)){
                continue;
            }
            if(ArrayHelper::getValue($items[$i], 'open', false)){
                Html::addCssClass($items[$i]['options'], ['open' => 'open', 'in' => 'in']);
                if($this->openParents){
                    $open = true;
                }
            }
            $childItems = ArrayHelper::getValue($child, 'items');
            if(is_array($childItems)){
                $openParent = false;
                $items[$i]['items'] = self::isChildOpen($childItems, $openParent);
                if($openParent){
                    Html::addCssClass($items[$i]['options'], ['open' => 'open', 'in' => 'in']);
                    $open = true;
                }
            }
        }
        return $items;
    }
}

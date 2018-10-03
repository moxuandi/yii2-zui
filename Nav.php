<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Nav 导航.
 *
 * @see http://zui.sexy/#component/nav
 */
class Nav extends Widget
{
    /**
     * @var array `ul.nav`的 HTML 属性.
     */
    public $options = [];
    /**
     * @var array 导航元素列表. 每个数组元素表示一个菜单项, 且应具有以下结构:
     * -`label`: string, required, 菜单项的标题;
     * -`url`: string|array, optional, 菜单项的链接地址, 默认为`#`;
     * -`options`: array, optional, 菜单项(`ul.nav > li`)的 HTML 属性;
     * -`linkOptions`: array, optional, 菜单项链接(`ul.nav > li > a`)的 HTML 属性;
     * -`encode`: bool, optional, 菜单项的标题是否 HTML 编码, 默认为`$encodeLabel`;
     * -`active`: bool, optional, 该菜单项在初始化时是否活动, 默认为`false`;
     * -`visible`: bool, optional, 该菜单项是否显示(不显示则不渲染), 默认为`true`;
     * -`dropDownCaret`: string, optional, 下拉菜单的符号, 默认为`$dropDownCarets`;
     * -`items`: array, optional, 子菜单项列表, 参考 [[Dropdown]];
     * -`dropDownOptions`: array, optional, 子菜单项(`ul.dropdown-menu`)的 HTML 属性, 将传递给 [[Dropdown::$options]];
     */
    public $items = [];
    /**
     * @var bool 菜单项的标题是否 HTML 编码.
     */
    public $encodeLabels = true;
    /**
     * @var string 下拉菜单的符号.
     */
    public $dropDownCarets = '<span class="caret"></span>';
    /**
     * @var bool 是否根据当前请求的路由判断是否激活菜单项.
     */
    public $activateItems = true;
    /**
     * @var bool 当子菜单项是活动时, 是否激活相应的父菜单项.
     */
    public $activateParents = false;
    /**
     * @var string 用于确定菜单项是否有效的路由. 如果未设置, 将使用当前请求的路由.
     */
    public $route;
    /**
     * @var array 用于确定菜单项是否有效的参数. 如果未设置, 将使用`$_GET`.
     */
    public $params;


    public function init()
    {
        parent::init();

        if($this->route === null && Yii::$app->controller !== null){
            $this->route = Yii::$app->controller->getRoute();
        }
        if($this->params === null){
            $this->params = Yii::$app->request->getQueryParams();
        }

        Html::addCssClassBefore($this->options, ['widget' => 'nav']);
    }

    public function run()
    {
        parent::run();

        ZuiAsset::register($this->getView());  // 需要 css 支持

        return self::renderItems();
    }

    /**
     * 渲染导航.
     * @return string
     */
    protected function renderItems()
    {
        $items = [];
        foreach($this->items as $i => $item){
            //if(isset($item['visible']) && !$item['visible']){}
            if(!ArrayHelper::remove($item, 'visible', true)){
                continue;
            }
            $items[] = self::renderItem($item);
        }

        return implode("\n", [
            Html::beginTag('ul', $this->options),
            implode("\n", $items),
            Html::endTag('ul')
        ]);
        //return Html::tag('ul', implode("\n", $items), $this->options);
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
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);

        if(isset($item['active'])){
            $active = ArrayHelper::remove($item, 'active', false);
        }else{
            $active = self::isItemActive($item);
        }

        if(empty($items)){
            $link = Html::a($label, ArrayHelper::getValue($item, 'url', '#'), $linkOptions);
        }else{
            $linkOptions['data-toggle'] = 'dropdown';
            Html::addCssClassBefore($options, ['widget' => 'dropdown']);  // 好像可以忽略
            Html::addCssClassBefore($linkOptions, ['widget' => 'dropdown-toggle']);
            if($dropDownCaret = ArrayHelper::getValue($item, 'dropDownCaret', $this->dropDownCarets)){
                $label .= ' ' . $dropDownCaret;
            }
            if(is_array($items)){
                $items = self::isChildActive($items, $active);
                $items = self::renderDropdown($items, $item);
            }
            $link = "\n" . Html::a($label, ArrayHelper::getValue($item, 'url', '#'), $linkOptions) . "\n" . $items . "\n";
        }

        if($active){
            Html::addCssClass($options, 'active');
        }

        return Html::tag('li', $link, $options);
    }

    /**
     * 检查菜单项是否活动.
     * 通过检查`$route`和`$params`是否与菜单项的`url`选项匹配, 来判断菜单项是否活动.
     * 当菜单项的`url`选项是以数组的形式指定的时候, 它的第一个元素被当作是菜单项的路由, 而其余的元素是关联的参数.
     * 只有当其路由和参数分别匹配`$route`和`$params`时, 菜单项才被视为活动的.
     * @param array $item
     * @return bool
     */
    protected function isItemActive($item)
    {
        if(!$this->activateItems){
            return false;
        }
        if(isset($item['url']) && is_array($item['url']) && isset($item['url'][0])){
            $route = $item['url'][0];
            if($route[0] !== '/' && Yii::$app->controller){
                $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            if(ltrim($route, '/') !== $this->route){
                return false;
            }
            unset($item['url']['#']);
            if(count($item['url']) > 1){
                $params = $item['url'];
                unset($params[0]);
                foreach($params as $name => $value){
                    if($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)){
                        return false;
                    }
                }
            }
            return true;
        }
        return false;
    }

    /**
     * 检查子菜单项是否处于活动状态, 以判断是否激活父菜单项.
     * @param array $items
     * @param bool $active
     * @return array
     */
    protected function isChildActive($items, &$active)
    {
        foreach($items as $i => $child){
            if(is_array($child) && !ArrayHelper::getValue($child, 'visible', true)){
                continue;
            }
            if(ArrayHelper::remove($items[$i], 'active', false) || self::isItemActive($child)){
                Html::addCssClass($items[$i]['options'], 'active');
                if($this->activateParents){
                    $active = true;
                }
            }
            $childItems = ArrayHelper::getValue($child, 'items');
            if(is_array($childItems)){
                $activeParent = false;
                $items[$i]['items'] = self::isChildActive($childItems, $activeParent);
                if($activeParent){
                    Html::addCssClass($items[$i]['options'], 'active');
                    $active = true;
                }
            }
        }
        return $items;
    }

    /**
     * 将给定的菜单项渲染为下拉菜单的子菜单.
     * @param array $items 给定的菜单项(子菜单).
     * @param array $parentItem 父菜单项信息(包括`$items`).
     * @return string
     */
    protected function renderDropdown($items, $parentItem)
    {
        return Dropdown::widget([
            'options' => ArrayHelper::getValue($parentItem, 'dropDownOptions', []),
            'items' => $items,
            'encodeLabels' => $this->encodeLabels,
            'view' => $this->getView(),
        ]);
    }
}

<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Dropdown 下拉菜单的菜单项.
 *
 * @see http://zui.sexy/#javascript/dropdown
 */
class Dropdown extends Widget
{
    /**
     * @var array 下拉菜单的项目列表, 每个数组元素表示一个菜单项, 数组结构如下:
     * -`label`: string, required, 菜单项显示的标题;
     * -`encode`: bool, optional, 菜单项的标题是否 HTML 编码, 默认为`$encodeLabels`;
     * -`url`: string|array, optional, 菜单项的链接URL;
     * -`visible`: bool, optional, 菜单项是否显示(不显示则不渲染), 默认为`true`;
     * -`options`: array, optional, 菜单项`li`的 HTML 属性;
     * -`linkOptions`: array, optional, 菜单项链接`a`的 HTML 属性;
     * -`items`: array, optional, 子菜单项;
     * -`submenuOptions`: bool, optional, 子菜单项`ul`的 HTML 属性, 将与`$submenuOptions`合并;
     */
    public $items = [];
    /**
     * @var array 下拉菜单`ul`的 HTML 属性.
     */
    public $options = [];
    /**
     * @var array 子菜单项`ul`的 HTML 属性, 适用于所有子菜单项, 将会与`$items`的`submenuOptions`合并.
     */
    public $submenuOptions = [];
    /**
     * @var bool 菜单项的标题是否 HTML 编码, 将被`$items`的`encode`覆盖;
     */
    public $encodeLabels = true;


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'dropdown-menu']);
        $this->options['role'] = 'menu';  // ZUI 示例中存在该属性
    }

    public function run()
    {
        parent::run();

        ZuiPluginAsset::register($this->getView());  // 需要 js 支持

        return self::renderItems($this->items, $this->options);
    }

    /**
     * 渲染菜单项.
     * @param array $items 菜单项.
     * @param array $options `ul`的 HTML 属性.
     * @return string 渲染结果.
     * @throws InvalidConfigException `label`未设置.
     */
    protected function renderItems($items, $options = [])
    {
        $lines = [];
        foreach($items as $item){
            if(is_string($item)){
                $lines[] = $item;
                continue;
            }

            //if(isset($item['visible']) && !$item['visible']){}
            if(!ArrayHelper::getValue($item, 'visible', true)){
                continue;
            }

            //if(!array_key_exists('label', $item)){}
            if(!ArrayHelper::keyExists('label', $item)){
                throw new InvalidConfigException("The 'label' option is required.");
            }

            $encodeLabel = ArrayHelper::getValue($item, 'encode', $this->encodeLabels);
            $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
            $itemOptions = ArrayHelper::getValue($item, 'options', []);
            $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
            //$linkOptions['tabindex'] = '-1';  // Bootstrap 需要, ZUI 不需要
            $url = ArrayHelper::getValue($item, 'url', null);
            if(empty($item['items'])){
                if($url === null){
                    $content = $label;
                    Html::addCssClassBefore($itemOptions, ['widget' => 'dropdown-header']);
                }else{
                    $content = Html::a($label, $url, $linkOptions);
                }
            }else{
                $submenuOptions = $this->submenuOptions;
                if(isset($item['submenuOptions'])){
                    $submenuOptions = array_merge($submenuOptions, $item['submenuOptions']);
                }
                Html::addCssClassBefore($submenuOptions, ['widget' => 'dropdown-menu']);
                $content = "\n" . Html::a($label, $url === null ? '#' : $url, $linkOptions) . "\n" . self::renderItems($item['items'], $submenuOptions) . "\n";
                Html::addCssClassBefore($itemOptions, ['widget' => 'dropdown-submenu']);
            }
            $lines[] = Html::tag('li', $content, $itemOptions);
        }

        return implode("\n", [
            Html::beginTag('ul', $options),
            implode("\n", $lines),
            Html::endTag('ul')
        ]);
        //return Html::tag('ul', implode("\n", $lines), $options);
    }
}

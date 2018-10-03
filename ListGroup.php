<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 ListGroup 列表组.
 *
 * @see http://zui.sexy/#component/listgroup
 */
class ListGroup extends Widget
{
    /**
     * @var array `div.list-group`或'ul.list-group'的 HTML 属性.
     */
    public $options = [];
    /**
     * @var string 列表组的类型.
     */
    public $type = 'li';
    /**
     * @var bool 列表项的标题是否 HTML 编码.
     */
    public $encodeLabels = true;
    /**
     * @var array 列表组的项目列表, 每个数组元素表示一个列表项. 数组结构如下:
     * -`label`: string, required, 列表项显示的标题;
     * -`url`: string|array, optional, 列表项的链接URL;
     * -`options`: array, optional, 列表项`li`的 HTML 属性;
     * -`linkOptions`: array, optional, 列表项链接`a`的 HTML 属性;
     * -`active`: bool, optional, 列表项是否时活动状态, 默认为`false`;
     * -`encode`: bool, optional, 列表项的标题是否 HTML 编码, 默认为`$encodeLabels`;
     * -`visible`: bool, optional, 列表项是否显示(不显示则不渲染), 默认为`true`;
     */
    public $items = [];


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'list-group']);
    }

    public function run()
    {
        parent::run();

        ZuiAsset::register($this->getView());  // 需要 css 支持

        $tag = $this->type === 'a' ? 'div' : 'ul';
        return implode("\n", [
            Html::beginTag($tag, $this->options),
            self::renderItems(),
            Html::endTag($tag)
        ]);
        //return Html::tag($this->type === 'a' ? 'div' : 'ul', self::renderItems(), $this->options);
    }

    /**
     * 渲染列表组.
     * @return string
     * @throws InvalidConfigException `label`未设置.
     */
    protected function renderItems()
    {
        $lines = [];
        foreach($this->items as $item){
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

            $label = ArrayHelper::getValue($item, 'encode', $this->encodeLabels) ? Html::encode($item['label']) : $item['label'];
            $url = ArrayHelper::getValue($item, 'url', null);
            $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
            $active = ArrayHelper::getValue($item, 'active', false);

            if($this->type === 'a'){
                Html::addCssClassBefore($linkOptions, ['widget' => 'list-group-item']);
                if($active){
                    Html::addCssClass($linkOptions, ['active' => 'active']);
                }
                $lines[] = Html::a($label, $url, $linkOptions);
            }else{
                $options = ArrayHelper::getValue($item, 'options', []);
                Html::addCssClassBefore($options, ['widget' => 'list-group-item']);
                if($active){
                    Html::addCssClass($options, ['active' => 'active']);
                }
                $content = $url === null ? $label : Html::a($label, $url, $linkOptions);
                $lines[] = Html::tag('li', $content, $options);
            }
        }
        return implode("\n", $lines);
    }
}

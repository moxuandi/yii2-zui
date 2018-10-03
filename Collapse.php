<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Collapse 折叠.
 *
 * @see http://zui.sexy/#javascript/collapse
 */
class Collapse extends Widget
{
    /**
     * @var array 最外层的 HTML 属性.
     */
    public $options = [];
    /**
     * @var array 折叠元素列表. 每个数组元素表示一个折叠元素(也是一个 Panel 面板), 且应具有以下结构:
     * -`label`: string, required, 折叠元素的标题;
     * -`content`: string|array|object, required, 折叠元素的内容;
     * -`labelOptions`: array, optional, 折叠元素标题(`div.panel-heading`)的 HTML 属性;
     * -`contentOptions`: array, optional, 折叠元素内容(`div.panel-body`或`ul.list-group`)的 HTML 属性;
     * -`tag`: string, optional, 折叠元素标题的标签名称, 默认为`a`, 也可以是`button`;
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
    /**
     * @var string 折叠元素的模板, 可用变量: `{header}`, `{content}`.
     */
    public $template = "<p>{header}</p>{content}";


    public function init()
    {
        parent::init();

        if(!isset($this->options['id'])){
            $this->options['id'] = $this->id;
        }
    }

    public function run()
    {
        parent::run();

        ZuiPluginAsset::register($this->getView());  // 需要 js 支持

        return Html::tag('div', self::renderItems(), $this->options);
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

            $items[] = self::renderItem($item, ++$index);
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

        $contentOptions = ArrayHelper::getValue($item, 'contentOptions', []);
        $id = ArrayHelper::getValue($contentOptions, 'id', $this->options['id'] . '-collapse-' . $index);
        $contentOptions['id'] = $id;

        // 渲染折叠元素标题
        $labelOptions = ArrayHelper::getValue($item, 'labelOptions', []);
        $labelOptions['data-toggle'] = 'collapse';
        if($this->autoCloseItems){
            $labelOptions['data-parent'] = '#' . $this->options['id'];
        }
        if(ArrayHelper::remove($item, 'tag', 'a') === 'a'){
            $header = Html::a(ArrayHelper::getValue($item, 'encode', $this->encodeLabel) ? Html::encode($item['label']) : $item['label'], '#' . $id, array_merge(['class' => 'btn'], $labelOptions));
        }else{
            $labelOptions['data-target'] = '#' . $id;
            $header = Html::button(ArrayHelper::getValue($item, 'encode', $this->encodeLabel) ? Html::encode($item['label']) : $item['label'], array_merge(['class' => 'btn'], $labelOptions));
        }

        // 渲染折叠元素内容
        if(ArrayHelper::getValue($item, 'active', false)){
            Html::addCssClassBefore($contentOptions, ['in' => 'in']);
        }
        Html::addCssClassBefore($contentOptions, ['widget' => 'collapse']);
        if(is_string($item['content']) || is_numeric($item['content']) || is_object($item['content'])){
            $content = Html::tag('div', $item['content'], $contentOptions);
        }elseif(is_array($item['content'])){
            $contents = [];
            foreach($item['content'] as $value){
                $contents[] = Html::tag('div', $value);
            }
            $content = Html::tag('div', implode("\n", $contents), $contentOptions);
        }else{
            throw new InvalidConfigException("The 'content' option should be a string, array or object.");
        }

        return str_replace(['{header}', '{content}'], [$header, $content], $this->template);
    }
}

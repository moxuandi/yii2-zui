<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Carousel 轮播.
 *
 * @see http://zui.sexy/#javascript/carousel
 */
class Carousel extends ZuiWidget
{
    /**
     * @var array 参数继承. 最外层(`div.carousel`)的 HTML 属性, 特殊可用参数.
     * -`data-interval`: int|bool, optional, 幻灯片轮换的等待时间. 如果为`false`, 轮播将不会自动开始循环. 默认为`5000`;
     * -`data-pause`: string, optional, 鼠标停留在幻灯片区域即暂停轮播, 鼠标离开即启动轮播. 默认为`'hover'`;
     * -`data-wrap`: bool, optional, 轮播是否持续循环. 默认为`true`;
     * -`data-touchable`: bool, optional, ????. 默认为`true`;
     */
    public $options = [];
    /**
     * @var array 轮播项目列表. 每个数组元素表示一个轮播项目, 且应具有以下结构:
     * -`content`: string, required, 轮播项目的内容, 通常时一张图片(`<img src="" />`);
     * -`caption`: string, optional, 轮播项目的介绍;
     * -`options`: array, optional, 轮播项目(`div.item`)的 HTML 属性;
     * -`captionOptions`: array, optional, 轮播项目的介绍(`div.carousel-caption`)的 HTML 属性;
     * -`indicatorOptions`: array, optional, 轮播项目对应的圆点指示器(`ol.carousel-indicators > li`)的 HTML 属性;
     */
    public $items = [];
    /**
     * @var array 轮播项目包裹层(`div.carousel-inner`)的 HTML 属性.
     */
    public $carouselInnerOptions = [];
    /**
     * @var bool 是否显示轮播的圆点指示器
     */
    public $showIndicators = true;
    /**
     * @var array 轮播的圆点指示器(`ol.carousel-indicators`)的 HTML 属性.
     */
    public $indicatorsOptions = [];
    /**
     * @var array 项目切换按钮. 且应具有以下结构:
     * -`prev`: string, required, 切换到上一个项目的样式;
     * -`next`: string, required, 切换到下一个项目的样式;
     * -`prevOptions`: array, optional, `a.left`的 HTML 属性;
     * -`nextOptions`: array, optional, `a.right`的 HTML 属性;
     */
    public $controls = [
        'prev' => '<span class="icon icon-prev"></span>',
        'next' => '<span class="icon icon-next"></span>',
        //'prev' => '<span class="icon icon-chevron-left"></span>',
        //'next' => '<span class="icon icon-chevron-right"></span>'
    ];


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'carousel', 'slide' => 'slide']);
        $this->options['data-ride'] = 'carousel';  // 该参数不知道有没有用

        if(!isset($this->options['id'])){
            $this->options['id'] = $this->id;
        }
    }

    public function run()
    {
        parent::run();

        $this->registerPlugin('carousel');

        return implode("\n", [
            Html::beginTag('div', $this->options),
            self::renderIndicators(),
            self::renderItems(),
            self::renderControls(),
            Html::endTag('div')
        ]);
    }

    /**
     * 渲染轮播项目.
     * @return string
     */
    protected function renderItems()
    {
        $items = [];
        for($i = 0, $count = count($this->items); $i < $count; $i++){
            $items[] = self::renderItem($this->items[$i], $i);
        }

        Html::addCssClassBefore($this->carouselInnerOptions, ['widget' => 'carousel-inner']);

        return implode("\n", [
            Html::beginTag('div', $this->carouselInnerOptions),
            implode("\n", $items),
            Html::endTag('div')
        ]);
        //return Html::tag('div', implode("\n", $items), $this->carouselInnerOptions);
    }

    /**
     * 渲染单个轮播项目.
     * @param array|string $item
     * @param int $index
     * @return string
     * @throws InvalidConfigException `content`未设置.
     */
    protected function renderItem($item, $index)
    {
        if(is_string($item)){
            $content = $item;
            $caption = null;
            $options = [];
        }elseif(isset($item['content'])){
            $content = $item['content'];
            $caption = ArrayHelper::getValue($item, 'caption', null);
            if($caption !== null){
                $captionOptions = ArrayHelper::getValue($item, 'captionOptions', []);
                Html::addCssClassBefore($captionOptions, ['widget' => 'carousel-caption']);
                $caption = Html::tag('div', $caption, $captionOptions);
            }
            $options = ArrayHelper::getValue($item, 'options', []);
        }else{
            throw new InvalidConfigException("The 'content' option is required.");
        }

        Html::addCssClassBefore($options, ['widget' => 'item']);
        if($index === 0){
            Html::addCssClass($options, 'active');
        }

        return implode("\n", [
            Html::beginTag('div', $options),
            $content,
            $caption,
            Html::endTag('div')
        ]);
        //return Html::tag('div', $content . "\n" . $caption, $options);
    }

    /**
     * 渲染轮播的圆点指示器.
     * @return string
     */
    protected function renderIndicators()
    {
        if($this->showIndicators === false){
            return '';
        }

        $indicators = [];
        for($i = 0, $count = count($this->items); $i < $count; $i++){
            $indicatorOptions = ArrayHelper::getValue($this->items[$i], 'indicatorOptions', []);
            $indicatorOptions['data-target'] = '#' . $this->options['id'];
            $indicatorOptions['data-slide-to'] = $i;
            if($i === 0){
                Html::addCssClass($indicatorOptions, 'active');
            }
            $indicators[] = Html::tag('li', '', $indicatorOptions);
        }

        Html::addCssClassBefore($this->indicatorsOptions, ['widget' => 'carousel-indicators']);

        return implode("\n", [
            Html::beginTag('ol', $this->indicatorsOptions),
            implode("\n", $indicators),
            Html::endTag('ol')
        ]);
        //return Html::tag('ol', implode("\n", $indicators), $this->indicatorsOptions);
    }

    /**
     * 渲染项目切换按钮.
     * @return string
     * @throws InvalidConfigException `controls`必须为`false`或同时设置`prev`和`next`.
     */
    protected function renderControls()
    {
        if($this->controls === false){
            return '';
        }

        if(!isset($this->controls['prev']) || !isset($this->controls['next'])){
            throw new InvalidConfigException("The 'controls' property must be either false or an array of two elements.");
        }

        $prevOptions = ArrayHelper::getValue($this->controls, 'prevOptions', []);
        $prevOptions['data-slide'] = 'prev';
        Html::addCssClassBefore($prevOptions, ['widget' => 'carousel-control', 'left' => 'left']);
        $nextOptions = ArrayHelper::getValue($this->controls, 'nextOptions', []);
        $nextOptions['data-slide'] = 'next';
        Html::addCssClassBefore($nextOptions, ['widget' => 'carousel-control', 'right' => 'right']);

        return Html::a($this->controls['prev'], '#' . $this->options['id'], $prevOptions) . "\n"
            . Html::a($this->controls['next'], '#' . $this->options['id'], $nextOptions);
    }
}

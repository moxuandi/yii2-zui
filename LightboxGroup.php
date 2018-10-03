<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一组 LightboxGroup 图片浏览.
 *
 * @see http://zui.sexy/#view/lightbox
 */
class LightboxGroup extends Widget
{
    /**
     * @var array 最外层(eg:`div.row`)的 HTML 属性. 特殊属性:
     */
    public $options = [];
    /**
     * @var array 图片信息列表. 每个数组元素表示一个图片元素, 且应具有以下结构:
     * -`data-image`: string, required, 图片地址(`div.row > div.col-xs-3 > a`的`href`属性);
     * -`data-small-image`: string, optional, 图片地址(`div.row > div.col-xs-3 > a > img`的`src`属性), 未设置时, 使用`data-image`值;
     * -`data-caption`: string, optional, 图片额外的描述文本;
     * -`options`: array, optional, 图片链接包裹层(eg:`div.row > div.col-xs-3`)的 HTML 属性, 默认为`$itemOptions`;
     * -`linkOptions`: array, optional, 图片链接(eg:`div.row > div.col-xs-3 > a`)的 HTML 属性;
     * -`imageOptions`: array, optional, 图片(eg:`div.row > div.col-xs-3 > a > img`)的 HTML 属性;
     */
    public $items = [];
    /**
     * @var array 图片链接包裹层(eg:`div.row > div.col-xs-3`)的 HTML 属性(统一配置).
     */
    public $itemOptions = [];
    /**
     * @var array 图片链接(eg:`div.row > div.col-xs-3 > a`)的 HTML 属性(统一配置). 特殊属性:
     * -`data-group`: string, optional, 图片链接(eg:`div.row > div.col-xs-3 > a`)的`data-group`属性, 默认为`$options['id']`;
     */
    public $linkOptions = [];
    /**
     * @var array 图片(eg:`div.row > div.col-xs-3 > a > img`)的 HTML 属性(统一配置).
     */
    public $imageOptions = [];


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

        return implode("\n", [
            Html::beginTag('div', $this->options),
            self::renderItems(),
            Html::endTag('div')
        ]);
        //return Html::tag('div', self::renderItems(), $this->options);
    }

    /**
     * 渲染图片浏览.
     * @return string
     * @throws InvalidConfigException `data-image`未设置.
     */
    protected function renderItems()
    {
        $images = [];
        foreach($this->items as $n => $item){
            if(!ArrayHelper::remove($item, 'visible', true)){
                continue;
            }

            //if(!array_key_exists('data-image', $item)){}
            if(!ArrayHelper::keyExists('data-image', $item)){
                throw new InvalidConfigException("The 'data-image' option is required.");
            }

            $imageUrl = ArrayHelper::remove($item, 'data-image');  // 大图

            $linkOptions = array_merge($this->linkOptions, ArrayHelper::getValue($item, 'linkOptions', []));
            $linkOptions['data-image'] = $imageUrl;
            $linkOptions['data-group'] = ArrayHelper::getValue($this->linkOptions, 'data-group', $this->options['id']);
            if(ArrayHelper::keyExists('data-caption', $item)){
                $linkOptions['data-caption'] = ArrayHelper::remove($item, 'data-caption');
            }

            $image = Html::img(ArrayHelper::remove($item, 'data-small-image', $imageUrl), array_merge($this->imageOptions, ArrayHelper::getValue($item, 'imageOptions', [])));
            $link = Lightbox::widget([
                'label' => $image,
                'encodeLabel' => false,
                'options' => $linkOptions
            ]);

            $images[$n] = Html::tag('div', $link, array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', [])));
        }
        return implode("\n", $images);
    }
}

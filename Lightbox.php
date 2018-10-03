<?php
namespace moxuandi\zui;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Lightbox 图片浏览.
 *
 * @see http://zui.sexy/#view/lightbox
 */
class Lightbox extends Widget
{
    /**
     * @var array 按钮, 链接或图片的 HTML 属性. 特殊属性:
     * -`tag`: string, optional, 标签名称, 默认为`a`;
     * -`data-image`: string, optional, 要浏览的图片路径;
     * -`data-caption`: string, optional, 图片额外的描述文本;
     * -`href`: string, optional, `$tag`为`a`时, 要浏览的图片路径. 如果未设置, 则使用`data-image`值; 如果设置了, 将忽略`data-image`值;
     * -`src`: string, optional, `$tag`为`img`时, 浏览前显示的图片的路径, 如果未设置, 则使用`data-image`值;
     */
    public $options = [];
    /**
     * @var string 按钮或链接的内容(图片不生效).
     */
    public $label = '浏览图片';
    /**
     * @var bool 按钮或链接的内容的内容是否 HTML 编码(图片不生效).
     */
    public $encodeLabel = true;


    public function init()
    {
        parent::init();

        $this->options['data-toggle'] = 'lightbox';
    }

    public function run()
    {
        parent::run();

        ZuiPluginAsset::register($this->getView());  // 需要 js 支持

        return self::renderButton();
    }

    /**
     * 渲染按钮.
     * @return string
     */
    protected function renderButton()
    {
        $label = $this->encodeLabel ? Html::encode($this->label) : $this->label;
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'a');
        switch($tag){
            case 'image':
                return Html::img(ArrayHelper::keyExists('src', $options) ? ArrayHelper::remove($options, 'src') : ArrayHelper::remove($options, 'data-image'), $options);
                break;
            case 'button':
                return Html::button($label, $options);
                break;
            default:
                return Html::a($label, ArrayHelper::remove($options, 'href', ArrayHelper::remove($options, 'data-image')), $options);
                break;
        }
    }
}

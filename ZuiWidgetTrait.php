<?php
namespace moxuandi\zui;

use Yii;
use yii\helpers\Json;

trait ZuiWidgetTrait
{
    /**
     * @var bool JS 插件的参数选项.
     */
    public $clientOptions = [];
    /**
     * @var bool|array JS 插件的事件处理程序.
     * 使用此属性需要 JS 插件支持事件, eg: [对话框|模态框](http://zui.sexy/#javascript/modal )的`show.zui.modal`事件.
     */
    public $clientEvents = [];


    public function init()
    {
        parent::init();

        if(!isset($this->options['id'])){
            $this->options['id'] = $this->id;
        }
    }

    protected function registerPlugin($name)
    {
        ZuiPluginAsset::register(self::getView());  // 注册 js 文件

        if(!empty($this->clientOptions)){
            $options = Json::htmlEncode($this->clientOptions);
            $js = "$('#" . $this->options['id'] . "').$name($options);";
            self::getView()->registerJs($js);  // 注册 js 代码
        }

        self::registerClientEvents();
    }

    protected function registerClientEvents()
    {
        if(!empty($this->clientEvents)){
            $js = [];
            foreach($this->clientEvents as $event => $handler){
                $js[] = "jQuery('#" . $this->options['id'] . "').on('$event', $handler);";
            }
            self::getView()->registerJs(implode("\n", $js));
        }
    }

    /**
     * @return \yii\web\View 可用于渲染视图或视图文件的视图对象.
     * @see \yii\base\Widget::getView()
     */
    abstract function getView();
}

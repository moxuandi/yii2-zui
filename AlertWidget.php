<?php
namespace moxuandi\zui;

use Yii;

/**
 * Class AlertWidget 从 $session 中渲染消息框信息.
 *
 * @see http://zui.sexy/#component/alert
 */
class AlertWidget extends Widget
{
    /**
     * @var array `div.alert`的 HTML 属性.
     */
    public $options = [];
    /**
     * @var array|false `div.alert > button`的 HTML 属性. 特殊属性:
     * -`tag`: string, optional, 按钮的标签名称, 默认为`button`;
     * -`label`: string, optional, 按钮的文本内容, 默认为`&times;`;
     * -`type`: string, optional, 按钮的 type 属性值(仅`tag='button'`), 默认为`button`;
     */
    public $closeButton = false;
    /**
     * @var array|false `div.alert > i`的 HTML 属性. 特殊属性:
     * -`tag`: string, optional, 图标的标签名称, 默认为`i`;
     */
    public $icon = false;
    /**
     * @var bool 是否使用反色主题.
     */
    public $inverse = false;
    /**
     * @var array 消息类型对应的感情色彩.
     */
    public $alertTypes = [
        'default' => '',
        'primary' => 'alert-primary',
        'error' => 'alert-danger',
        'danger' => 'alert-danger',
        'success' => 'alert-success',
        'warning' => 'alert-warning',
        'info' => 'alert-info',
    ];
    /**
     * @var array 消息类型对应的感情色彩(反色).
     */
    public $inverseTypes = [
        'default' => 'alert-inverse',
        'primary' => 'alert-primary-inverse',
        'error' => 'alert-danger-inverse',
        'danger' => 'alert-danger-inverse',
        'success' => 'alert-success-inverse',
        'warning' => 'alert-warning-inverse',
        'info' => 'alert-info-inverse',
    ];
    /**
     * @var array `div.alert > i`的默认css类.
     */
    public $iconTypes = [
        'default' => 'icon-inbox',
        'primary' => 'icon-star',
        'error' => 'icon-remove-sign',
        'danger' => 'icon-remove-sign',
        'success' => 'icon-ok-sign',
        'warning' => 'icon-frown',
        'info' => 'icon-info-sign',
    ];


    public function init()
    {
        parent::init();

        $session = Yii::$app->session;
        $flashes = $session->getAllFlashes();

        foreach($flashes as $type => $data){
            if(isset($this->alertTypes[$type])){
                $data = (array)$data;
                foreach($data as $i => $message){
                    if($this->inverse){
                        Html::addCssClassBefore($this->options, $this->inverseTypes[$type]);
                    }else{
                        Html::addCssClassBefore($this->options, $this->alertTypes[$type]);
                    }
                    $this->options['id'] = $this->id . '-' . $type . '-' . $i;

                    if($this->icon !== false && !isset($this->icon['class'])){
                        $this->icon['class'] = $this->iconTypes[$type];
                    }

                    echo Alert::widget([
                        'options' => $this->options,
                        'body' => $message,
                        'closeButton' => $this->closeButton,
                        'icon' => $this->icon,
                    ]);
                }

                $session->removeFlash($type);
            }
        }
    }
}

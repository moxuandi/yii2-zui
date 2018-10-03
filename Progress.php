<?php
namespace moxuandi\zui;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * 渲染一个 Progress 进度条.
 *
 * @see http://zui.sexy/#control/progressbar
 */
class Progress extends Widget
{
    /**
     * @var array `div.progress`的 HTML 属性.
     */
    public $options = [];
    /**
     * @var string 进度条上显示的文本.
     */
    public $label;
    /**
     * @var int 进度百分比, 0-100
     */
    public $percent = 0;
    /**
     * @var array 进度条(`div.progress > div.progress-bar`)的 HTML 属性
     */
    public $barOptions = [];
    /**
     * 进度条堆叠, 每个元素代表一个进度条元素. 可用参数:
     * -`percent`: int, required, 进度百分比, 0-100;
     * -`label`: string, optional, 进度上显示的文本;
     * -`options`: array, optional, 进度的 HTML 属性;
     * @var array
     */
    public $bars = [];
    /**
     * @var string|false 进度条文本(`div.progress > div.progress-bar > span.sr-only`)的模板, 可用变量: `{percent}`.
     */
    public $barText = "{percent}% Complete";


    public function init()
    {
        parent::init();

        Html::addCssClassBefore($this->options, ['widget' => 'progress']);
    }

    public function run()
    {
        parent::run();

        ZuiAsset::register($this->getView());  // 需要 css 支持

        return implode("\n", [
            Html::beginTag('div', $this->options),
            self::renderProgress(),
            Html::endTag('div')
        ]);
        //return Html::tag('div', "\n" . self::renderProgress() . "\n", $this->options);
    }

    /**
     * 渲染进度条.
     * @return string
     * @throws InvalidConfigException `percent`未设置.
     */
    protected function renderProgress()
    {
        if(empty($this->bars)){
            return self::renderBar($this->percent, $this->label, $this->barOptions);
        }

        $bars = [];
        foreach($this->bars as $bar){
            if(!isset($bar['percent'])){
                throw new InvalidConfigException("The 'percent' option is required.");
            }
            $label = ArrayHelper::getValue($bar, 'label', null);
            $options = ArrayHelper::getValue($bar, 'options', []);
            $bars[] = self::renderBar($bar['percent'], $label, $options);
        }
        return implode("\n", $bars);
    }

    /**
     * 渲染一个进度.
     * @param int $percent 进度百分比, 0-100.
     * @param string $label 进度上显示的文本.
     * @param array $options 进度的 HTML 属性.
     * @return string
     */
    protected function renderBar($percent, $label = '', $options = [])
    {
        $defaultOptions = [
            'role' => 'progressbar',
            'aria-valuenow' => $percent,
            'aria-valuemin' => 0,
            'aria-valuemax' => 100,
            'style' => "width:{$percent}%",
        ];
        $options = array_merge($defaultOptions, $options);
        Html::addCssClassBefore($options, ['widget' => 'progress-bar']);

        $out = Html::beginTag('div', $options);
        $out .= $label;
        if($this->barText){
            $out .= Html::tag('span', str_replace('{percent}', $this->percent, $this->barText), ['class' => 'sr-only']);
        }
        $out .= Html::endTag('div');

        return $out;
    }
}

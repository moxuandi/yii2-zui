# [JS插件 - Chosen](http://zui.sexy/#javascript/chosen)

Chosen是用来增强单选列表和多选列表的更佳选择.

<div class="alert alert-danger">
  <h4>兼容性问题</h4>
  <p>在触摸屏及移动设备上无法启用 Chosen。</p>
</div>

### 单项选择

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\Chosen', [
    'items' => [
        '' => '',
        'cat' => '小猫',
        'fish' => '金鱼',
        'dragon' => '龙',
        'mammoth' => '猛犸',
        'gollum' => '咕噜',
    ],
    'options' => [
        'data-placeholder' => '选择一个宠物...',
    ],
]);

// 无model调用
echo Chosen::widget([
    'name' => 'demo',  // 必须设置
    'value' => 'fish',
    'items' => [
        '' => '',
        'cat' => '小猫',
        'fish' => '金鱼',
        'dragon' => '龙',
        'mammoth' => '猛犸',
        'gollum' => '咕噜',
    ],
    'options' => [
        'data-placeholder' => '选择一个宠物...',
    ],
]);
```


### 多项选择

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\Chosen', [
    'items' => [
        'strawberries' => '草莓',
        'apple' => '苹果',
        'orange' => '橙子',
        'cherry' => '樱桃',
        'banana' => '香蕉',
        'figs' => '无花果',
    ],
    'options' => [
        'multiple' => 'multiple',
        'data-placeholder' => '选择一些爱吃的水果...',
    ],
]);

// 无model调用
echo Chosen::widget([
    'name' => 'demo',  // 必须设置
    'value' => ['cherry', 'banana'],
    'items' => [
        'strawberries' => '草莓',
        'apple' => '苹果',
        'orange' => '橙子',
        'cherry' => '樱桃',
        'banana' => '香蕉',
        'figs' => '无花果',
    ],
    'options' => [
        'multiple' => 'multiple',
        'data-placeholder' => '选择一些爱吃的水果...',
    ],
]);
```


### 自定义参数调用

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\Chosen', [
    'items' => [
        '' => '',
        'cat' => '小猫',
        'fish' => '金鱼',
        'dragon' => '龙',
        'mammoth' => '猛犸',
        'gollum' => '咕噜',
    ],
    'options' => [
        'data-placeholder' => '选择一个宠物...',
    ],
    'clientOptions' => [
        'allow_single_deselect' => true,  // 允许取消单选
        'disable_search_threshold' => 10,  // 10 个以下的选择项则不显示检索框
    ],
]);

// 无model调用
echo Chosen::widget([
    'name' => 'demo',  // 必须设置
    'value' => 'fish',
    'items' => [
        '' => '',
        'cat' => '小猫',
        'fish' => '金鱼',
        'dragon' => '龙',
        'mammoth' => '猛犸',
        'gollum' => '咕噜',
    ],
    'options' => [
        'data-placeholder' => '选择一个宠物...',
    ],
    'clientOptions' => [
        'allow_single_deselect' => true,  // 允许取消单选
        'disable_search_threshold' => 10,  // 10 个以下的选择项则不显示检索框
    ],
]);
```


### Chosen 图标选择插件

为方便选择漂亮的图标, 依赖于Chosen新作了图标选择插件. 该插件可以使用chosen的所有选项和方法.

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\ChosenIcons');

// 无model调用
echo ChosenIcons::widget([
    'name' => 'demo',  // 必须设置
    'value' => 'icon-qrcode',
    'options' => [
        //'data-value' => 'icon-star',  // 同$value
    ]
]);
```


### 扩展检索 ----- 未实现

有时我们希望用户检索的更加开心, 例如为汉语选项添加拼音检索支持.
Chosen提供了扩展字段专门用来检索, 只需要为`<option>`标签增加`data-keys="*"`属性.
`data-keys`属性可以用空格或英文逗号来分隔多个供检索的关键字.


### `$clientOptions`可用选项

- `lang`: string 界面语言. 可选值:`zh-cn`, `zh-tw`, `en`.
- `allow_single_deselect`: bool 是否允许取消单选. 默认为`true`.
- `disable_search`: bool 是否禁用检索. 默认为`true`.
- `disable_search_threshold`: int 自动禁用检索的最大值. 默认为`0`.
- `inherit_select_classes`: bool 继承`<select>`的CSS类. 默认为`0`.
    如果设置为`true`, chosen 在初始化之后会获取原`<select>`上的CSS类, 并添加在chosen容器`.chosen-container`上.
- `max_selected_options`: int 多选时的最大选择数目. 默认为`Infinity`. 当用户选择的选项数目达到此值时, 将会触发`chosen:maxselected`事件.
- `no_results_text`: string 当用户检索时没有匹配的结果时, 显示的提示文本. 中文默认`没有找到"searchText"`.
- `placeholder_text`: string 当用户没有选择选项时显示的文本. 默认为``. 此选项也可以通过`<select>`的`data-placeholder`属性来指定.
- `placeholder_text_multiple`: string 多选空值占位文本. 默认为``. 如果没有设置此选项, 则会尝试读取`placeholder_text`选项的值.
- `placeholder_text_single`: string 单选空值占位文本. 默认为``. 如果没有设置此选项, 则会尝试读取`placeholder_text`选项的值.
- `search_contains`: bool 是否启用任意位置检索. 默认为`false`, 仅仅会从选项或检索关键字的开始进行匹配, 例如`"he"`仅仅能匹配`"hello"`, 不能匹配`"ahead"`; 如果启用此选项, 则可以从关键的任意位置进行匹配.
- `single_backstroke_delete`: bool 是否启用退格键删除. 默认为`true`, 仅多选时生效.
- `width`: string chosen的宽度. 默认为`<select>`的宽度.
- `display_disabled_options`: bool 是否显示不可选的选项. 默认为`true`.
- `display_selected_options`: bool 是否显示已选择的选项. 默认为`true`, 仅多选时生效.
- `drop_direction`: string 选项列表弹出方向. 可选值:`auto`(默认), `down`, `up`.
- `middle_highlight`: bool|string 高亮的选项居中. 可选值:`false`(默认), `true`, `always`.

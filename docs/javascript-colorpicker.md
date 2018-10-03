# [JS插件 - 颜色选择器](http://zui.sexy/#javascript/colorpicker)

### 按钮选择器

为`<input type="hidden">`设置`[data-provide="colorpicker"]`属性将以按钮的形式设置颜色值. 所设置的颜色值会同步更新到`<input>`中， 通过获取`<input>`的`value`属性值将会得到所选的颜色值.

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\ColorPicker', [
    'options' => [
        'type' => 'hidden',
        'data-pull-menu-right' => 'false',
        'data-btn-tip' => '主题颜色',
    ],
]);

// 无model调用
echo ColorPicker::widget([
    'name' => 'demo',  // 必须设置
    'options' => [
        'type' => 'hidden',
        'data-pull-menu-right' => 'false',
        'data-btn-tip' => '主题颜色',
    ],
]);
```


### 使用输入组

将`<input type="text">`放置在`div class="input-group">`中, 并为`<input>`设置`data-wrapper="input-group-btn"`属性即可, 这样为用户提供一个输入十六进制颜色值的文本框. 用户自定义的颜色值将会追加到颜色菜单末尾以供重复选择.

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\ColorPicker', [
    'template' => '<div class="input-group">{input}</div>',
    //'template' => '<div class="input-group"><span class="input-group-addon">主题颜色</span>{input}</div>',
    'options' => [
        'data-wrapper' => 'input-group-btn',
        'data-pull-menu-right' => 'false',
        'placeholder' => '请输入16进制颜色值，例如 #FF00DD',
    ],
]);

// 无model调用
echo ColorPicker::widget([
    'name' => 'demo',  // 必须设置
    'template' => '<div class="input-group">{input}</div>',
    //'template' => '<div class="input-group"><span class="input-group-addon">主题颜色</span>{input}</div>',
    'options' => [
        'data-wrapper' => 'input-group-btn',
        'data-pull-menu-right' => 'false',
        'placeholder' => '请输入16进制颜色值，例如 #FF00DD',
    ],
]);
```


### 自定义预设颜色

使用`colors`选项来自定义预设的颜色. 当使用`[data-colors]`时, 将多个颜色值用逗号进行分隔.

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\ColorPicker', [
    'options' => [
        'type' => 'hidden',
        'data-colors' => '#fff,#000,#3280fC,red',
        //'data-colors' => ['#fff', '#000', '#3280fC', 'red'],
    ],
]);

// 无model调用
echo ColorPicker::widget([
    'name' => 'demo',  // 必须设置
    'options' => [
        'type' => 'hidden',
        'data-colors' => '#fff,#000,#3280fC,red',
        //'data-colors' => ['#fff', '#000', '#3280fC', 'red'],
    ],
]);
```


### 自定义按钮图标

使用`icon`选项来自定义预设的颜色. 可供使用的图标参见 [控件 - 图标](http://zui.sexy/#control/icon) 章节.

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\ColorPicker', [
    'template' => '<div class="input-group">{input}</div>',
    'options' => [
        'data-wrapper' => 'input-group-btn',
        'data-icon' => 'tint',
    ],
]);

// 无model调用
echo ColorPicker::widget([
    'name' => 'demo',  // 必须设置
    'template' => '<div class="input-group">{input}</div>',
    'options' => [
        'data-wrapper' => 'input-group-btn',
        'data-icon' => 'tint',
    ],
]);
```


### 同步更新

使用`update-*`选项来为页面上的其他元素更新颜色或文本`

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\ColorPicker', [
    'options' => [
        'type' => 'hidden',
        'data-update-text' => '#myColor4Label',
        'data-update-color' => '#myColor4Label',
    ],
]);
echo '<div>你刚刚选择了颜色：<strong id="myColor4Label"></strong></div>';

// 无model调用
echo ColorPicker::widget([
    'name' => 'demo',  // 必须设置
    'options' => [
        'type' => 'hidden',
        'data-update-text' => '#myColor4Label',
        'data-update-color' => '#myColor4Label',
    ],
]);
echo '<div>你刚刚选择了颜色：<strong id="myColor4Label"></strong></div>';
```

### `$options`可用选项

- `data-colors`: string|array 预设颜色列表. 用逗号分割的十六进制颜色字符串, 或数组.
- `data-pull-menu-right`: bool 下拉菜单是以右侧对齐. 默认为`true`.
- `data-wrapper`: string 下拉按钮父元素的 CSS 类. 默认为`btn-wrapper`.
- `data-tile-size`: string 颜色方块大小. 默认为`30`, 单位像素, 宽高等值.
- `data-line-count`: int 每行颜色方块的数目. 默认为`5`.
- `data-optional`: bool 是否允许空值. 默认为`true`.
- `data-icon`: string 按钮上的图标. 默认为`caret-down`.
- `data-btn-tip`: string 按钮提示文本. 默认为`null`.
- `data-tooltip`: string 是否显示提示消息. 默认为`top`, 其它值:`bottom`, `left`, `right`, `false`.
- `data-error-tip`: string 错误格式提示消息. 中文默认为`不是有效的颜色值`.
- `data-update-color`: string 同步更新文本颜色. 必须是有效的 CSS 选择器.
- `data-update-border`: string 同步更新边框颜色. 必须是有效的 CSS 选择器.
- `data-update-background`: string 同步更新背景颜色. 必须是有效的 CSS 选择器.
- `data-update-text`: string 同步更新文本内容. 必须是有效的 CSS 选择器.
- `data-lang`: string 语言选项. 可选值`zh-cn`, `zh-tw`, `en`.


### 使用JS手动初始化 ----- 未实现

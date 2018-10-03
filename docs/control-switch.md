# [控件 - 开关](http://zui.sexy/#control/switch)


### 普通示例

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\SwitchInput', [
    'inputOptions' => [
        'value' => 10,  // 开关开启时的值
        'uncheck' => 3  // 开关关闭时的值
    ]
]);
```
渲染结果:
```html
<div class="switch">
    <input name="Demo[demo]" value="3" type="hidden">
    <input id="demo-demo" name="Demo[demo]" value="10" aria-invalid="false" type="checkbox">
    <label for="demo-demo">夜间模式</label>
</div>
```


### 左右对齐

使用`.text-left`或`.text-right`来更改文字对齐方向.

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\SwitchInput', [
    'options' => ['class' => 'text-left'],
    'inputOptions' => [
        'value' => 10,  // 开关开启时的值
        'uncheck' => 3  // 开关关闭时的值
    ]
]);
```
渲染结果:
```html
<div class="switch text-left" aria-required="true">
    <input name="Demo[demo]" value="3" type="hidden">
    <input id="demo-demo" name="Demo[demo]" value="10" type="checkbox">
    <label for="demo-demo">夜间模式</label>
</div>
```


### 内联样式

使用`.switch-inline`让`.switch`作为`inline-block`展示.

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\SwitchInput', [
    'options' => ['class' => 'switch-inline'],
    'inputOptions' => [
        'value' => 10,  // 开关开启时的值
        'uncheck' => 3  // 开关关闭时的值
    ]
]);
```
渲染结果:
```html
<div class="switch switch-inline" aria-required="true">
    <input name="Demo[demo]" value="3" type="hidden">
    <input id="demo-demo" name="Demo[demo]" value="10" type="checkbox">
    <label for="demo-demo">夜间模式</label>
</div>
```


### 禁用

为`.switch`添加`.disabled`类, 或者为`<input>`添加`[disabled]`属性.

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\SwitchInput', [
    'options' => ['class' => 'disabled'],
    'inputOptions' => [
        'value' => 10,  // 开关开启时的值
        'uncheck' => 3  // 开关关闭时的值
    ]
]);

echo $form->field($model, 'demo')->widget('moxuandi\zui\SwitchInput', [
    'inputOptions' => [
        'disabled' => 'disabled',
        'value' => 10,  // 开关开启时的值
        'uncheck' => 3  // 开关关闭时的值
    ]
]);
```
渲染结果:
```html
<div class="switch disabled" aria-required="true">
    <input name="Demo[demo]" value="3" type="hidden">
    <input id="demo-demo" name="Demo[demo]" value="10" type="checkbox">
    <label for="demo-demo">夜间模式</label>
</div>

<div class="switch">
    <input name="Demo[demo]" value="3" type="hidden">
    <input id="demo-demo" name="Demo[demo]" value="10" disabled="disabled" type="checkbox">
    <label for="demo-demo">夜间模式</label>
</div>
```


### 无model调用

```php
echo SwitchInput::widget([
    'name' => 'demo',  // 必须设置
    'value' => 10,
    'inputOptions' => [
        'value' => 10,  // 开关开启时的值
        'uncheck' => 3  // 开关关闭时的值
    ],
]);
```
渲染结果:
```html
<div class="switch">
    <input name="demo" value="3" type="hidden">
    <input id="w1_demo" name="demo" value="10" checked="" type="checkbox">
    <label for="w1_demo">demo</label>
</div>
```

# [控件 - 按钮](http://zui.sexy/#control/button)

按钮是用来触发一些动作. 通常用在表单、对话框、菜单上面. 好的按钮设计能够引导用户高效的达到目的.

##### 按钮组的用法请参见 [组件 - 按钮组](component-buttongroup.md)

### 按钮的类型

```php
// 标准按钮:
echo Button::widget(['label' => '标准按钮']);
echo Button::widget(['label' => '标准按钮', 'options' => ['tag' => 'a']]);
echo Button::widget(['label' => '提交按钮', 'options' => ['tag' => 'input']]);

// 主要按钮:
echo Button::widget(['label' => '主要按钮', 'options' => ['class' => 'btn-primary']]);

// 链接按钮:
echo Button::widget(['label' => '链接按钮', 'options' => ['class' => 'btn-link']]);

// 提交按钮
echo Button::widget(['label' => '提交按钮', 'options' => ['type' => 'submit']]);
echo Button::widget(['label' => '提交按钮', 'options' => ['tag' => 'input', 'type' => 'submit']]);
```
渲染结果:
```html
<!-- 标准按钮 -->
<button type="button" class="btn">标准按钮</button>
<a class="btn" href="#">标准按钮</a>
<input class="btn" value="提交按钮" type="button">

<!-- 主要按钮 -->
<button type="button" class="btn btn-primary">主要按钮</button>

<!-- 链接按钮 -->
<button type="button" class="btn btn-link">链接按钮</button>

<!-- 提交按钮 -->
<button type="submit" class="btn">提交按钮</button>
<input class="btn" value="提交按钮" type="submit">
```


### 按钮的大小

```php
echo Button::widget(['label' => '大尺寸按钮', 'options' => ['class' => 'btn-lg']]);
echo Button::widget(['label' => '默认大小']);
echo Button::widget(['label' => '较小的按钮', 'options' => ['class' => 'btn-sm']]);
echo Button::widget(['label' => '迷你按钮', 'options' => ['class' => 'btn-xs']]);
echo Button::widget(['label' => '迷你按钮', 'options' => ['class' => 'btn-mini']]);
echo Button::widget(['label' => '块状按钮', 'options' => ['class' => 'btn-block']]);
```
渲染结果:
```html
<button type="button" class="btn btn-lg">大尺寸按钮</button>
<button type="button" class="btn">默认大小</button>
<button type="button" class="btn btn-sm">较小的按钮</button>
<button type="button" class="btn btn-xs">迷你按钮</button>
<button type="button" class="btn btn-mini">迷你按钮</button>
<button type="button" class="btn btn-block">块状按钮</button>
```


### 按钮的不同状态

```php
echo Button::widget(['label' => '<i class="icon icon-star"></i> 带图标的按钮', 'encodeLabel' => false]);
echo Button::widget(['label' => '状态切换按钮', 'options' => ['data-toggle' => 'button']]);
echo Button::widget(['label' => '已禁用的操作', 'options' => ['class' => 'disabled']]);
echo Button::widget(['label' => '活动的按钮', 'options' => ['class' => 'active']]);

// js 切换按钮状态(需要 button.js 支持)
echo Button::widget([
    'label' => '加载状态',
    'options' => [
        'id' => 'loadingBtnExample',
        'class' => 'btn-primary',
        'data-loading-text' => '正在加载...',
    ]
]);
$this->registerJs('$("#loadingBtnExample").on("click", function() {
    var $btn = $(this);
    $btn.button("loading");

    // 此处使用 setTimeout 来模拟你的复杂功能逻辑
    setTimeout(function() {
        $btn.button("reset");
    }, 2000);
});', \yii\web\View::POS_END);
```
渲染结果:
```html
<button type="button" class="btn"><i class="icon icon-star"></i> 带图标的按钮</button>
<button type="button" class="btn" data-toggle="button">状态切换按钮</button>
<button type="button" class="btn disabled">已禁用的操作</button>
<button type="button" class="btn active">活动的按钮</button>

<!-- js 切换按钮状态(需要 button.js 支持) -->
<button type="button" id="loadingBtnExample" class="btn btn-primary" data-loading-text="正在加载...">加载状态</button>
<script>
$("#loadingBtnExample").on("click", function() {
    var $btn = $(this);
    $btn.button("loading");

    // 此处使用 setTimeout 来模拟你的复杂功能逻辑
    setTimeout(function() {
        $btn.button("reset");
    }, 2000);
});
</script>
```


### 按钮的颜色

按钮的颜色赋予按钮以感情色彩能够在视觉上首当其冲的体现按钮的功能意向. 例如重要按钮和标准按钮的颜色不同而体现其重要程度. 使用更多的颜色来使得目的更加明确, 与用户期望一致.

```php
echo Button::widget(['label' => '默认']);
echo Button::widget(['label' => '主要', 'options' => ['class' => 'btn-primary']]);
echo Button::widget(['label' => '信息', 'options' => ['class' => 'btn-info']]);
echo Button::widget(['label' => '成功', 'options' => ['class' => 'btn-success']]);
echo Button::widget(['label' => '警告', 'options' => ['class' => 'btn-warning']]);
echo Button::widget(['label' => '危险', 'options' => ['class' => 'btn-danger']]);
```
渲染结果:
```html
<button type="button" class="btn">默认</button>
<button type="button" class="btn btn-primary">主要</button>
<button type="button" class="btn btn-info">信息</button>
<button type="button" class="btn btn-success">成功</button>
<button type="button" class="btn btn-warning">警告</button>
<button type="button" class="btn btn-danger">危险</button>
```


### Button 按钮组样式的复选框组/单选按钮组

为按钮组中的每个按钮使用`<label>`标签，并在其中包含`checkbox`或`radio`类型的表单控件就可以启用一个按钮组的多选组件. 其机制同于表单中的多项选择控件(复选框).

```php
// 多选
echo $form->field($model, 'demo')->widget('moxuandi\zui\ToggleButtonGroup', [
    //'type' => 'checkbox',  // 默认为:'checkbox'
    'items' => [1 => '多选1', 2 => '多选2', 3 => '多选3']
]);

// 单选
echo $form->field($model, 'demo')->widget('moxuandi\zui\ToggleButtonGroup', [
    'type' => 'radio',
    'items' => [1 => '单选1', 2 => '单选2', 3 => '单选3']
]);

// 使用颜色
echo $form->field($model, 'demo')->widget('moxuandi\zui\ToggleButtonGroup', [
    'labelOptions' => ['class' => 'btn-primary'],
    'items' => [1 => '多选1', 2 => '多选2', 3 => '多选3']
]);

// 单独调用
echo ToggleButtonGroup::widget([
    'model' => $model,
    'attribute' => 'demo',
    'type' => 'radio',
    'labelOptions' => ['class' => 'btn-primary'],
    'items' => [1 => '单选1', 2 => '单选2', 3 => '单选3']
]);

// 无model版
echo ToggleButtonGroup::widget([
    'name' => 'demo',  // 必须设置
    'value' => 2,
    'type' => 'radio',
    'labelOptions' => ['class' => 'btn-primary'],
    'items' => [1 => '单选1', 2 => '单选2', 3 => '单选3']
]);
```
渲染结果:
```html
<!-- 多选 -->
<input name="Demo[demo]" value="" type="hidden">
<div id="demo-demo" class="btn-group" data-toggle="buttons">
    <label class="btn"><input name="Demo[demo][]" value="1" type="checkbox"> 多选1</label>
    <label class="btn active"><input name="Demo[demo][]" value="2" checked="" type="checkbox"> 多选2</label>
    <label class="btn"><input name="Demo[demo][]" value="3" type="checkbox"> 多选3</label>
</div>

<!-- 单选 -->
<input name="Demo[demo]" value="" type="hidden">
<div id="demo-demo" class="btn-group" data-toggle="buttons">
    <label class="btn"><input name="Demo[demo]" value="1" type="radio"> 单选1</label>
    <label class="btn active"><input name="Demo[demo]" value="2" checked="" type="radio"> 单选2</label>
    <label class="btn"><input name="Demo[demo]" value="3" type="radio"> 单选3</label>
</div>

<!-- 使用颜色 -->
<input name="Demo[demo]" value="" type="hidden">
<div id="demo-demo" class="btn-group" data-toggle="buttons">
    <label class="btn btn-primary"><input name="Demo[demo][]" value="1" type="checkbox"> 多选1</label>
    <label class="btn btn-primary active"><input name="Demo[demo][]" value="2" checked="" type="checkbox"> 多选2</label>
    <label class="btn btn-primary"><input name="Demo[demo][]" value="3" type="checkbox"> 多选3</label>
</div>

<!-- 单独调用 -->
<input name="Demo[demo]" value="" type="hidden">
<div id="demo-demo" class="btn-group" data-toggle="buttons">
    <label class="btn btn-primary"><input name="Demo[demo]" value="1" type="radio"> 单选1</label>
    <label class="btn btn-primary active"><input name="Demo[demo]" value="2" checked="" type="radio"> 单选2</label>
    <label class="btn btn-primary"><input name="Demo[demo]" value="3" type="radio"> 单选3</label>
</div>

<!-- 无model版 -->
<div id="w1_demo" class="btn-group" data-toggle="buttons">
    <label class="btn btn-primary"><input name="demo" value="1" type="radio"> 单选1</label>
    <label class="btn btn-primary active"><input name="demo" value="2" checked="" type="radio"> 单选2</label>
    <label class="btn btn-primary"><input name="demo" value="3" type="radio"> 单选3</label>
</div>
```

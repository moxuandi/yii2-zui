# [组件 - 面板](http://zui.sexy/#component/panel)

### 基本类型

```php
echo Panel::widget(['content' => '默认的.panel所做的只是提供基本的边界和内部, 来包含内容. ']);
```
渲染结果:
```html
<div class="panel">
    <div class="panel-body">默认的.panel所做的只是提供基本的边界和内部, 来包含内容. </div>
</div>
```


### 带标题的面板

```php
echo Panel::widget(['header' => '面板标题', 'content' => '面板内容']);
echo Panel::widget(['header' => '<a href="#">面板标题</a>', 'content' => '面板内容', 'headerOptions' => ['class' => 'panel-title']]);
```
渲染结果:
```html
<div class="panel">
    <div class="panel-heading">面板标题</div>
    <div class="panel-body">面板内容</div>
</div>

<div class="panel">
    <div class="panel-heading panel-title"><a href="#">面板标题</a></div>
    <div class="panel-body">面板内容</div>
</div>
```


### 带脚注的面板

```php
echo Panel::widget(['content' => '面板内容', 'footer' => '面板脚注']);
```
渲染结果:
```html
<div class="panel">
    <div class="panel-body">面板内容</div>
    <div class="panel-footer">面板脚注</div>
</div>
```


### 色彩主题

```php
// Primary
echo Panel::widget([
    'header' => '.panel-primary',
    'content' => '面板内容',
    'options' => ['class' => 'panel-primary'],
]);
// Success
echo Panel::widget([
    'header' => '.panel-success',
    'content' => '面板内容',
    'options' => ['class' => 'panel-success'],
]);
// Warning
echo Panel::widget([
    'header' => '.panel-warning',
    'content' => '面板内容',
    'options' => ['class' => 'panel-warning'],
]);
// Danger
echo Panel::widget([
    'header' => '.panel-danger',
    'content' => '面板内容',
    'options' => ['class' => 'panel-danger'],
]);
// Info
echo Panel::widget([
    'header' => '.panel-info',
    'content' => '面板内容',
    'options' => ['class' => 'panel-info'],
]);
```
渲染结果:
```html
<!-- Primary -->
<div class="panel panel-primary">
    <div class="panel-heading">.panel-primary</div>
    <div class="panel-body">面板内容</div>
</div>
<!-- Success -->
<div class="panel panel-success">
    <div class="panel-heading">.panel-success</div>
    <div class="panel-body">面板内容</div>
</div>
<!-- Warning -->
<div class="panel panel-warning">
    <div class="panel-heading">.panel-warning</div>
    <div class="panel-body">面板内容</div>
</div>
<!-- Danger -->
<div class="panel panel-danger">
    <div class="panel-heading">.panel-danger</div>
    <div class="panel-body">面板内容</div>
</div>
<!-- Info -->
<div class="panel panel-info">
    <div class="panel-heading">.panel-info</div>
    <div class="panel-body">面板内容</div>
</div>
```


### 合并`$content`和`$footer`

```php
echo Panel::widget([
    'header' => '面板标题',
    'content' => '面板内容',
    'footer' => '面板脚注',
    'template' => "{header}\n<div class='panel-collapse'>\n{content}\n{footer}\n</div>",
]);
```
渲染结果:
```html
<div class="panel">
    <div class="panel-heading">面板标题</div>
    <div class="panel-collapse">
        <div class="panel-body">面板内容</div>
        <div class="panel-footer">面板脚注</div>
    </div>
</div>
```


### 面板组

```php
<div class="panel-group">
    echo Panel::widget([
        'header' => '.panel-primary',
        'content' => '面板内容',
        'options' => ['class' => 'panel-primary'],
    ]);
    echo Panel::widget([
        'header' => '.panel-success',
        'content' => '面板内容',
        'options' => ['class' => 'panel-success'],
    ]);
</div>
```
渲染结果:
```html
<div class="panel-group">
    <div class="panel panel-primary">
        <div class="panel-heading">.panel-primary</div>
        <div class="panel-body">面板内容</div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">.panel-success</div>
        <div class="panel-body">面板内容</div>
    </div>
</div>
```

### 包含表格 ----- 未实现
(实现思路1, Panel::begin(); Panel::end();)
(实现思路2, 将表格赋值给$content)
### 包含列表 ----- 未实现
(实现思路1, Panel::begin(); Panel::end();)
(实现思路2, 将列表赋值给$content)

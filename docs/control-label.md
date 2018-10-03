# [控件 - 标签](http://zui.sexy/#control/label)

### 基本样式

```php
echo Html::tag('span', '标签', ['class' => 'label']);
```
渲染结果:
```html
<span class="label">标签</span>
```


### 颜色主题

```php
// Default
echo Html::tag('span', 'Default', ['class' => 'label']);
// Primary
echo Html::tag('span', 'Primary', ['class' => 'label label-primary']);
// Success
echo Html::tag('span', 'Success', ['class' => 'label label-success']);
// Info
echo Html::tag('span', 'Info', ['class' => 'label label-info']);
// Warning
echo Html::tag('span', 'Warning', ['class' => 'label label-warning']);
// Danger
echo Html::tag('span', 'Danger', ['class' => 'label label-danger']);
```
渲染结果:
```html
<!-- Default -->
<span class="label">Default</span>
<!-- Primary -->
<span class="label label-primary">Primary</span>
<!-- Success -->
<span class="label label-success">Success</span>
<!-- Info -->
<span class="label label-info">Info</span>
<!-- Warning -->
<span class="label label-warning">Warning</span>
<!-- Danger -->
<span class="label label-danger">Danger</span>
```


### 作为徽标(`.label-badge`)

```php
// Default
echo Html::tag('span', '12', ['class' => 'label label-badge']);
// Primary
echo Html::tag('span', 'Primary', ['class' => 'label label-badge label-primary']);
// Success
echo Html::tag('span', 'Success', ['class' => 'label label-badge label-success']);
// Info
echo Html::tag('span', 'Info', ['class' => 'label label-badge label-info']);
// Warning
echo Html::tag('span', 'Warning', ['class' => 'label label-badge label-warning']);
// Danger
echo Html::tag('span', 'Danger', ['class' => 'label label-badge label-danger']);
```
渲染结果:
```html
<!-- Default -->
<span class="label label-badge">12</span>
<!-- Primary -->
<span class="label label-badge label-primary">Primary</span>
<!-- Success -->
<span class="label label-badge label-success">Success</span>
<!-- Info -->
<span class="label label-badge label-info">Info</span>
<!-- Warning -->
<span class="label label-badge label-warning">Warning</span>
<!-- Danger -->
<span class="label label-badge label-danger">Danger</span>
```


### 小圆点徽标(`.label-dot`)

```php
// Default
echo Html::tag('span', 'Default', ['class' => 'label label-dot']);
// Primary
echo Html::tag('span', 'Primary', ['class' => 'label label-dot label-primary']);
// Success
echo Html::tag('span', 'Success', ['class' => 'label label-dot label-success']);
// Info
echo Html::tag('span', 'Info', ['class' => 'label label-dot label-info']);
// Warning
echo Html::tag('span', 'Warning', ['class' => 'label label-dot label-warning']);
// Danger
echo Html::tag('span', 'Danger', ['class' => 'label label-dot label-danger']);
```
渲染结果:
```html
<!-- Default -->
<span class="label label-dot">Default</span>
<!-- Primary -->
<span class="label label-dot label-primary">Primary</span>
<!-- Success -->
<span class="label label-dot label-success">Success</span>
<!-- Info -->
<span class="label label-dot label-info">Info</span>
<!-- Warning -->
<span class="label label-dot label-warning">Warning</span>
<!-- Danger -->
<span class="label label-dot label-danger">Danger</span>
```


### 线圈徽标(带边框背景透明)(`.label-circle`)

```php
// Default
echo Html::tag('span', 'Default', ['class' => 'label label-circle']);
// Primary
echo Html::tag('span', 'Primary', ['class' => 'label label-circle label-primary']);
// Success
echo Html::tag('span', 'Success', ['class' => 'label label-circle label-success']);
// Info
echo Html::tag('span', 'Info', ['class' => 'label label-circle label-info']);
// Warning
echo Html::tag('span', 'Warning', ['class' => 'label label-circle label-warning']);
// Danger
echo Html::tag('span', 'Danger', ['class' => 'label label-circle label-danger']);
```
渲染结果:
```html
<!-- Default -->
<span class="label label-circle">Default</span>
<!-- Primary -->
<span class="label label-circle label-primary">Primary</span>
<!-- Success -->
<span class="label label-circle label-success">Success</span>
<!-- Info -->
<span class="label label-circle label-info">Info</span>
<!-- Warning -->
<span class="label label-circle label-warning">Warning</span>
<!-- Danger -->
<span class="label label-circle label-danger">Danger</span>
```


### 按钮中的徽标

```php
echo Button::widget(['label' => '我的消息 <span class="label label-badge">12</span>', 'encodeLabel' => false]);
echo Button::widget(['label' => '处理错误 <span class="label label-badge label-primary">12</span>', 'encodeLabel' => false]);
echo Button::widget(['label' => '联系人 <span class="label label-badge">12</span>', 'options' => ['class' => 'btn-primary'], 'encodeLabel' => false]);

echo Button::widget(['label' => '我的消息 <span class="label label-dot">12</span>', 'encodeLabel' => false]);
echo Button::widget(['label' => '处理错误 <span class="label label-dot label-primary">12</span>', 'encodeLabel' => false]);
echo Button::widget(['label' => '联系人 <span class="label label-dot">12</span>', 'options' => ['class' => 'btn-primary'], 'encodeLabel' => false]);
```
渲染结果:
```html
<button type="button" class="btn">我的消息 <span class="label label-badge">12</span></button>
<button type="button" class="btn">处理错误 <span class="label label-badge label-primary">12</span></button>
<button type="button" class="btn btn-primary">联系人 <span class="label label-badge">12</span></button>

<button type="button" class="btn">我的消息 <span class="label label-dot">12</span></button>
<button type="button" class="btn">处理错误 <span class="label label-dot label-primary">12</span></button>
<button type="button" class="btn btn-primary">联系人 <span class="label label-dot">12</span></button>
```


### 列表组中的徽标和标签

```php
echo ListGroup::widget([
    'type' => 'a',
    'encodeLabels' => false,
    'items' => [
        ['label' => 'Project <span class="label label-success">New</span>', 'url' => '#'],
        ['label' => 'todo', 'url' => '#'],
        ['label' => 'story <span class="label label-badge label-primary">3 stories</span>', 'url' => '#'],
        ['label' => 'task <span class="label label-badge label-info">10 tasks</span>', 'url' => '#'],
        ['label' => 'bug <span class="label label-badge label-warning">2 bugs</span>', 'url' => '#'],
        ['label' => 'case <span class="label label-badge label-danger">100+</span>', 'url' => '#'],
    ]
]);
```
渲染结果:
```html
<div class="list-group">
    <a class="list-group-item" href="#">Project <span class="label label-success">New</span></a>
    <a class="list-group-item" href="#">todo</a>
    <a class="list-group-item" href="#">story<span class="label label-badge label-primary">3 stories</span></a>
    <a class="list-group-item" href="#">task<span class="label label-info label-badge">10 tasks</span></a>
    <a class="list-group-item" href="#">bug <span class="label label-badge label-warning">2 bugs</span></a>
    <a class="list-group-item" href="#">case <span class="label label-badge label-danger">100+</span></a>
</div>
```

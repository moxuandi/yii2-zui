# [组件 - 按钮组](http://zui.sexy/#component/buttongroup)

## 类型

### 一组按钮

通过`div.btn-group`包含多个`button`:

```php
echo ButtonGroup::widget([
    'buttons' => [
        ['label' => '左'],
        ['label' => '中'],
        ['label' => '右']
    ],
]);
```
渲染结果:
```html
<div class="btn-group">
  <button type="button" class="btn">左</button>
  <button type="button" class="btn">中</button>
  <button type="button" class="btn">右</button>
</div>
```

### 多组按钮

通过`div.btn-toolbar`包含`.div.btn-group`:

```php
<div class="btn-toolbar">
    echo ButtonGroup::widget([
        'buttons' => [
            ['label' => '复制'],
            ['label' => '剪切'],
            ['label' => '粘贴'],
            ['label' => '删除']
        ],
    ]);
    echo ButtonGroup::widget([
        'encodeLabels' => false,
        'buttons' => [
            ['label' => '<i class="icon icon-picture"></i>'],
            ['label' => '<i class="icon icon-file-movie"></i>'],
            ['label' => '<i class="icon icon-file-text-o"></i>']
        ],
    ]);
    echo ButtonGroup::widget([
        'encodeLabels' => false,
        'buttons' => [
            ['label' => '<i class="icon icon-code"></i>']
        ],
    ]);
</div>
```
渲染结果:
```html
<div class="btn-toolbar">
    <div class="btn-group">
        <button type="button" class="btn">复制</button>
        <button type="button" class="btn">剪切</button>
        <button type="button" class="btn">粘贴</button>
        <button type="button" class="btn">删除</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn"><i class="icon icon-picture"></i></button>
        <button type="button" class="btn"><i class="icon icon-file-movie"></i></button>
        <button type="button" class="btn"><i class="icon icon-file-text-o"></i></button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn"><i class="icon icon-code"></i></button>
    </div>
</div>
```

### 垂直按钮组

通过`div.btn-group-vertical`实现. 

```php
echo ButtonGroup::widget([
    'options' => [
        'class' => 'btn-group-vertical'
    ],
    'buttons' => [
        ['label' => '上面'],
        ['label' => '中间'],
        ['label' => '下面']
    ],
]);
```
渲染结果:
```html
<div class="btn-group btn-group-vertical">
  <button type="button" class="btn">上面</button>
  <button type="button" class="btn">中间</button>
  <button type="button" class="btn">下面</button>
</div>
```

## 变化

### 基本下拉按钮组 ----- 未实现
### 分裂式下拉按钮组 ----- 未实现
### 上拉按钮组 ----- 未实现


### 大小

通过`.btn-group-lg`、`.btn-group-sm`、`.btn-group-xs`实现. 

```php
// 大的:
echo ButtonGroup::widget([
    'options' => [
        'class' => 'btn-group-lg'
    ],
    'buttons' => [
        ['label' => '左'],
        ['label' => '中'],
        ['label' => '右']
    ],
]);
// 默认大小:
echo ButtonGroup::widget([
    'buttons' => [
        ['label' => '左'],
        ['label' => '中'],
        ['label' => '右']
    ],
]);
// 小的:
echo ButtonGroup::widget([
    'options' => [
        'class' => 'btn-group-sm'
    ],
    'buttons' => [
        ['label' => '左'],
        ['label' => '中'],
        ['label' => '右']
    ],
]);
// 超小的:
echo ButtonGroup::widget([
    'options' => [
        'class' => 'btn-group-xs'
    ],
    'buttons' => [
        ['label' => '左'],
        ['label' => '中'],
        ['label' => '右']
    ],
]);
// 另一种方式:
echo ButtonGroup::widget([
    'buttons' => [
        ['label' => '左', 'options' => ['class' => 'btn-lg']],
        ['label' => '中', 'options' => ['class' => 'btn-lg']],
        ['label' => '右', 'options' => ['class' => 'btn-lg']],
    ],
]);
```
渲染结果:
```html
<!-- 大的 -->
<div class="btn-group btn-group-lg">
    <button type="button" class="btn">左</button>
    <button type="button" class="btn">中</button>
    <button type="button" class="btn">右</button>
</div>
<!-- 默认大小 -->
<div class="btn-group">
    <button type="button" class="btn">左</button>
    <button type="button" class="btn">中</button>
    <button type="button" class="btn">右</button>
</div>
<!-- 小的 -->
<div class="btn-group btn-group-sm">
    <button type="button" class="btn">左</button>
    <button type="button" class="btn">中</button>
    <button type="button" class="btn">右</button>
</div>
<!-- 超小的 -->
<div class="btn-group btn-group-xs">
    <button type="button" class="btn">左</button>
    <button type="button" class="btn">中</button>
    <button type="button" class="btn">右</button>
</div>
<!-- 另一种方式 -->
<div class="btn-group">
    <button type="button" class="btn btn-lg">左</button>
    <button type="button" class="btn btn-lg">中</button>
    <button type="button" class="btn btn-lg">右</button>
</div>
```

### 颜色

```php
echo ButtonGroup::widget([
    'buttons' => [
        ['label' => 'Normal'],
        ['label' => '.btn-primary', 'options' => ['class' => 'btn-primary']],
        ['label' => '.btn-warning', 'options' => ['class' => 'btn-warning']],
        ['label' => '.btn-danger', 'options' => ['class' => 'btn-danger']],
        ['label' => '.btn-success', 'options' => ['class' => 'btn-success']],
        ['label' => '.btn-info', 'options' => ['class' => 'btn-info']]
    ],
]);
```
渲染结果:
```html
<div class="btn-group">
  <button type="button" class="btn">Normal</button>
  <button type="button" class="btn btn-primary">.btn-primary</button>
  <button type="button" class="btn btn-warning">.btn-warning</button>
  <button type="button" class="btn btn-danger">.btn-danger</button>
  <button type="button" class="btn btn-success">.btn-success</button>
  <button type="button" class="btn btn-info">.btn-info</button>
</div>
```

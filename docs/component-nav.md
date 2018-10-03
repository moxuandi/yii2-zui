# [组件 - 导航](http://zui.sexy/#component/nav)

### 主要导航(`.nav-primary`)

```php
echo Nav::widget([
    'options' => ['class' => 'nav-primary'],
    'items' => [
        ['label' => '首页', 'url' => '#', 'active' => true],
        ['label' => '动态 <span class="label label-badge label-success">4</span>', 'url' => '#', 'encode' => false],
        ['label' => '项目', 'url' => '#'],
        ['label' => '更多', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => 'bug', 'url' => '#'],
            ['label' => '需求', 'url' => '#'],
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
```
渲染结果:
```html
<ul class="nav nav-primary">
    <li class="active"><a href="#">首页</a></li>
    <li><a href="#">动态 <span class="label label-badge label-success">4</span></a></li>
    <li><a href="#">项目</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">更多 <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" tabindex="-1">任务</a></li>
            <li><a href="#" tabindex="-1">bug</a></li>
            <li><a href="#" tabindex="-1">需求</a></li>
            <li><a href="#" tabindex="-1">用例</a></li>
        </ul>
    </li>
</ul>
```


### 次要导航(`.nav-secondary`)

通常与主导航一起使用

```php
echo Nav::widget([
    'options' => ['class' => 'nav-secondary'],
    'items' => [
        ['label' => '首页', 'url' => '#', 'active' => true],
        ['label' => '动态 <span class="label label-badge label-success">4</span>', 'url' => '#', 'encode' => false],
        ['label' => '项目', 'url' => '#'],
        ['label' => '更多', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => 'bug', 'url' => '#'],
            ['label' => '需求', 'url' => '#'],
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
```
渲染结果:
```html
<ul class="nav nav-secondary">
    <li class="active"><a href="#">首页</a></li>
    <li><a href="#">动态 <span class="label label-badge label-success">4</span></a></li>
    <li><a href="#">项目</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">更多 <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" tabindex="-1">任务</a></li>
            <li><a href="#" tabindex="-1">bug</a></li>
            <li><a href="#" tabindex="-1">需求</a></li>
            <li><a href="#" tabindex="-1">用例</a></li>
        </ul>
    </li>
</ul>
```


### 标签页导航(`.nav-tabs`)

```php
echo Nav::widget([
    'options' => ['class' => 'nav-tabs'],
    'items' => [
        ['label' => '首页', 'url' => '#', 'active' => true],
        ['label' => '动态 <span class="label label-badge label-success">4</span>', 'url' => '#', 'encode' => false],
        ['label' => '项目', 'url' => '#'],
        ['label' => '更多', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => 'bug', 'url' => '#'],
            ['label' => '需求', 'url' => '#'],
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
```
渲染结果:
```html
<ul class="nav nav-tabs">
    <li class="active"><a href="#">首页</a></li>
    <li><a href="#">动态 <span class="label label-badge label-success">4</span></a></li>
    <li><a href="#">项目</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">更多 <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" tabindex="-1">任务</a></li>
            <li><a href="#" tabindex="-1">bug</a></li>
            <li><a href="#" tabindex="-1">需求</a></li>
            <li><a href="#" tabindex="-1">用例</a></li>
        </ul>
    </li>
</ul>
```


### 圆点导航(`.nav-pills`)

```php
echo Nav::widget([
    'options' => ['class' => 'nav-pills'],
    'items' => [
        ['label' => '首页', 'url' => '#', 'active' => true],
        ['label' => '动态 <span class="label label-badge label-success">4</span>', 'url' => '#', 'encode' => false],
        ['label' => '项目', 'url' => '#'],
        ['label' => '更多', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => 'bug', 'url' => '#'],
            ['label' => '需求', 'url' => '#'],
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
```
渲染结果:
```html
<ul class="nav nav-pills">
    <li class="active"><a href="#">首页</a></li>
    <li><a href="#">动态 <span class="label label-badge label-success">4</span></a></li>
    <li><a href="#">项目</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">更多 <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" tabindex="-1">任务</a></li>
            <li><a href="#" tabindex="-1">bug</a></li>
            <li><a href="#" tabindex="-1">需求</a></li>
            <li><a href="#" tabindex="-1">用例</a></li>
        </ul>
    </li>
</ul>
```


### 垂直排列(`.nav-stacked`)

垂直排列(`.nav-stacked`)可以与主要导航(`.nav-primary`), 次要导航(`.nav-secondary`), 标签页导航(`.nav-tabs`), 圆点导航(`.nav-pills`)同时使用.

```php
echo Nav::widget([
    'options' => ['class' => 'nav-primary nav-stacked'],
    'items' => [
        ['label' => '首页', 'url' => '#', 'active' => true],
        ['label' => '动态 <span class="label label-badge label-success">4</span>', 'url' => '#', 'encode' => false],
        ['label' => '项目', 'url' => '#'],
        ['label' => '更多', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => 'bug', 'url' => '#'],
            ['label' => '需求', 'url' => '#'],
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
```
渲染结果:
```html
<ul class="nav nav-primary nav-stacked">
    <li class="active"><a href="#">首页</a></li>
    <li><a href="#">动态 <span class="label label-badge label-success">4</span></a></li>
    <li><a href="#">项目</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">更多 <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" tabindex="-1">任务</a></li>
            <li><a href="#" tabindex="-1">bug</a></li>
            <li><a href="#" tabindex="-1">需求</a></li>
            <li><a href="#" tabindex="-1">用例</a></li>
        </ul>
    </li>
</ul>
```


### 自适应宽度(`.nav-justified`)

自适应宽度(`.nav-justified`)可以与主要导航(`.nav-primary`), 次要导航(`.nav-secondary`), 标签页导航(`.nav-tabs`), 圆点导航(`.nav-pills`)同时使用.

自适应宽度(`.nav-justified`)不能与垂直排列(`.nav-stacked`)同时使用.


```php
echo Nav::widget([
    'options' => ['class' => 'nav-primary nav-justified'],
    'items' => [
        ['label' => '首页', 'url' => '#', 'active' => true],
        ['label' => '动态 <span class="label label-badge label-success">4</span>', 'url' => '#', 'encode' => false],
        ['label' => '项目', 'url' => '#'],
        ['label' => '更多', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => 'bug', 'url' => '#'],
            ['label' => '需求', 'url' => '#'],
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
```
渲染结果:
```html
<ul class="nav nav-primary nav-justified">
    <li class="active"><a href="#">首页</a></li>
    <li><a href="#">动态 <span class="label label-badge label-success">4</span></a></li>
    <li><a href="#">项目</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">更多 <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" tabindex="-1">任务</a></li>
            <li><a href="#" tabindex="-1">bug</a></li>
            <li><a href="#" tabindex="-1">需求</a></li>
            <li><a href="#" tabindex="-1">用例</a></li>
        </ul>
    </li>
</ul>
```


### 禁用的导航链接

在禁用的项目上添加`.disabled`

```php
echo Nav::widget([
    'options' => ['class' => 'nav-primary'],
    'items' => [
        ['label' => '首页', 'url' => '#', 'active' => true],
        ['label' => '动态 <span class="label label-badge label-success">4</span>', 'url' => '#', 'encode' => false],
        ['label' => '项目', 'url' => '#', 'options' => ['class' => 'disabled']],
        ['label' => '更多', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => 'bug', 'url' => '#'],
            ['label' => '需求', 'url' => '#'],
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
```
渲染结果:
```html
<ul class="nav nav-primary">
    <li class="active"><a href="#">首页</a></li>
    <li><a href="#">动态 <span class="label label-badge label-success">4</span></a></li>
    <li class="disabled"><a href="#">项目</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">更多 <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" tabindex="-1">任务</a></li>
            <li><a href="#" tabindex="-1">bug</a></li>
            <li><a href="#" tabindex="-1">需求</a></li>
            <li><a href="#" tabindex="-1">用例</a></li>
        </ul>
    </li>
</ul>
```


### 带标题的导航

```php
echo Nav::widget([
    'options' => ['class' => 'nav-primary'],
    'items' => [
        '<li class="nav-heading">这是标题</li>',
        ['label' => '首页', 'url' => '#', 'active' => true],
        ['label' => '动态 <span class="label label-badge label-success">4</span>', 'url' => '#', 'encode' => false],
        ['label' => '项目', 'url' => '#'],
        ['label' => '更多', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => 'bug', 'url' => '#'],
            ['label' => '需求', 'url' => '#'],
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
```
渲染结果:
```html
<ul class="nav nav-primary">
    <li class="nav-heading">这是标题</li>
    <li class="active"><a href="#">首页</a></li>
    <li><a href="#">动态 <span class="label label-badge label-success">4</span></a></li>
    <li><a href="#">项目</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">更多 <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" tabindex="-1">任务</a></li>
            <li><a href="#" tabindex="-1">bug</a></li>
            <li><a href="#" tabindex="-1">需求</a></li>
            <li><a href="#" tabindex="-1">用例</a></li>
        </ul>
    </li>
</ul>
```


### 下拉菜单中的标题和分割线

```php
echo Nav::widget([
    'options' => ['class' => 'nav-primary'],
    'items' => [
        ['label' => '首页', 'url' => '#', 'active' => true],
        ['label' => '动态 <span class="label label-badge label-success">4</span>', 'url' => '#', 'encode' => false],
        ['label' => '项目', 'url' => '#'],
        ['label' => '更多', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => 'bug', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '下拉菜单标题'],
            ['label' => '需求', 'url' => '#'],
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
```
渲染结果:
```html
<ul class="nav nav-primary"><li class="active"><a href="#">首页</a></li>
    <li><a href="#">动态 <span class="label label-badge label-success">4</span></a></li>
    <li><a href="#">项目</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">更多 <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="#" tabindex="-1">任务</a></li>
            <li><a href="#" tabindex="-1">bug</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">下拉菜单标题</li>
            <li><a href="#" tabindex="-1">需求</a></li>
            <li><a href="#" tabindex="-1">用例</a></li>
        </ul>
    </li>
</ul>
```

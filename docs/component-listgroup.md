# [组件 - 列表组](http://zui.sexy/#component/listgroup)

### 基本类型

```php
echo ListGroup::widget([
    'items' => [
        ['label' => '用ul &gt; li实现, 点击区域只有文字', 'url' => '#'],
        ['label' => '项目', 'url' => '#'],
        ['label' => '待办', 'url' => '#'],
        ['label' => '需求', 'url' => '#'],
        ['label' => '任务', 'url' => '#'],
        ['label' => 'Bug', 'url' => '#'],
        ['label' => '用例']
    ]
]);
```
渲染结果:
```html
<ul class="list-group">
    <li class="list-group-item"><a href="#">用ul &amp;gt; li实现, 点击区域只有文字</a></li>
    <li class="list-group-item"><a href="#">项目</a></li>
    <li class="list-group-item"><a href="#">待办</a></li>
    <li class="list-group-item"><a href="#">需求</a></li>
    <li class="list-group-item"><a href="#">任务</a></li>
    <li class="list-group-item"><a href="#">Bug</a></li>
    <li class="list-group-item">用例</li>
</ul>
```


### 链接

直接为`<a>`添加`.list-group-item`类. 

```php
echo ListGroup::widget([
    'type' => 'a',
    'items' => [
        ['label' => '用div &gt; a实现, 实现整行点击', 'url' => '#'],
        ['label' => '项目', 'url' => '#'],
        ['label' => '待办', 'url' => '#'],
        ['label' => '需求', 'url' => '#'],
        ['label' => '任务', 'url' => '#', 'active' => true],
        ['label' => 'Bug', 'url' => '#'],
        ['label' => '用例']
    ]
]);
```
渲染结果:
```html
<div class="list-group">
    <a class="list-group-item" href="#">用div &amp;gt; a实现, 实现整行点击</a>
    <a class="list-group-item" href="#">项目</a>
    <a class="list-group-item" href="#">待办</a>
    <a class="list-group-item" href="#">需求</a>
    <a class="list-group-item active" href="#">任务</a>
    <a class="list-group-item" href="#">Bug</a>
    <a class="list-group-item">用例</a>
</div>
```


### 定制列表内容

```php
echo ListGroup::widget([
    'type' => 'a',
    'encodeLabels' => false,
    'items' => [
        ['label' => '<h4 class="list-group-item-heading">项目</h4><p class="list-group-item-text text-muted">共12个新条目</p>', 'url' => '#'],
        ['label' => '<h4 class="list-group-item-heading">Bug</h4><p class="list-group-item-text text-muted">没有未处理的bug</p>', 'url' => '#', 'active' => true],
        ['label' => '<h4 class="list-group-item-heading">任务</h4><p class="list-group-item-text text-muted"># 处理bug</p>', 'url' => '#']
    ]
]);
```
渲染结果:
```html
<div class="list-group">
    <a class="list-group-item" href="#">
        <h4 class="list-group-item-heading">项目</h4>
        <p class="list-group-item-text text-muted">共12个新条目</p>
    </a>
    <a class="list-group-item active" href="#">
        <h4 class="list-group-item-heading">Bug</h4>
        <p class="list-group-item-text text-muted">没有未处理的bug</p>
    </a>
    <a class="list-group-item" href="#">
        <h4 class="list-group-item-heading">任务</h4>
        <p class="list-group-item-text text-muted"># 处理bug</p>
    </a>
</div>
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

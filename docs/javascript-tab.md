# [JS插件 - 标签页](http://zui.sexy/#javascript/tab)

标签页允许通过点击一个导航或列表项目来切换显示的内容.

### 结构

标签页一般配合[组件 - 导航](component-nav.md)使用, 为导航上每个用于切换标签内容的链接添加`[href]`或`[data-target]`属性指向当前标签页内容的 ID, 并添加`[data-toggle="tab"]`属性.

另一种快捷方法是为用于切换标签页的链接使用`[data-tab]`属性, 属性值指向所切换的`.tab-pane`元素. 这种方法不需要`[data-target]`和`[data-toggle="tab"]`属性.

标签页内容使用`.tab-pane`作为容器元素, 所有供切换显示的`.tab-pane`放置在`.tab-content`容器元素内.

为确保在页面显示的时候标签页能够指示正确的标签和显示正确的内容, 在初始状态需要为当前选中的导航项目`<li>`元素添加`.active`类, 并且为当前显示的标签页内容元素`.tab-pane`添加`.active`类.

#### 示例

```php
echo Tab::widget([
    'items' => [
        ['label' => '标签1', 'content' => '我是标签1.'],
        ['label' => '标签2', 'content' => '标签2的内容', 'paneOptions' => ['id' => 'myveryownID'], 'active' => true],
        ['label' => '标签链接', 'url' => 'http://www.example.com', 'linkOptions' => ['target' => '_blank']],
        ['label' => '下拉标签',  'items' => [
            ['label' => '下拉标签1', 'content' => '下拉标签1的内容.'],
            ['label' => '下拉标签2', 'content' => '下拉标签2的内容.']
        ]]
    ]
]);
```
渲染结果:
```html
<ul id="w0" class="nav nav-tabs">
    <li><a href="#w0-tab-0" data-toggle="tab">标签1</a></li>
    <li class="active"><a href="#myveryownID" data-toggle="tab">标签2</a></li>
    <li><a href="http://www.example.com" target="_blank">标签链接</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">下拉标签 <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#w0-tab-3-dd-0" data-toggle="tab">下拉标签1</a></li>
            <li><a href="#w0-tab-3-dd-1" data-toggle="tab">下拉标签2</a></li>
        </ul>
    </li>
</ul>
<div class="tab-content">
    <div id="w0-tab-0" class="tab-pane fade">我是标签1.</div>
    <div id="myveryownID" class="tab-pane active fade in">标签2的内容</div>
    <div id="w0-tab-3-dd-0" class="tab-pane fade">下拉标签1的内容.</div>
    <div id="w0-tab-3-dd-1" class="tab-pane fade">下拉标签2的内容.</div>
</div>
```


### 禁用动画效果

为每个`.tab-pane`添加`.fade`类, 可以使得标签内容在显示时获得渐变动画效果. 在初始状态要显示的标签页内容`.tab-pane`不仅需要添加`.active`类, 还需要添加`.in`类.

```php
echo Tab::widget([
    'fade' => false,
    'items' => [
        ['label' => '标签1', 'content' => '我是标签1.'],
        ['label' => '标签2', 'content' => '标签2的内容', 'paneOptions' => ['id' => 'myveryownID'], 'active' => true],
        ['label' => '标签链接', 'url' => 'http://www.example.com', 'linkOptions' => ['target' => '_blank']],
        ['label' => '下拉标签',  'items' => [
            ['label' => '下拉标签1', 'content' => '下拉标签1的内容.'],
            ['label' => '下拉标签2', 'content' => '下拉标签2的内容.']
        ]]
    ]
]);
```
渲染结果:
```html
<ul id="w0" class="nav nav-tabs">
    <li><a href="#w0-tab-0" data-toggle="tab">标签1</a></li>
    <li class="active"><a href="#myveryownID" data-toggle="tab">标签2</a></li>
    <li><a href="http://www.example.com" target="_blank">标签链接</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">下拉标签 <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#w0-tab-3-dd-0" data-toggle="tab">下拉标签1</a></li>
            <li><a href="#w0-tab-3-dd-1" data-toggle="tab">下拉标签2</a></li>
        </ul>
    </li>
</ul>
<div class="tab-content">
    <div id="w0-tab-0" class="tab-pane">我是标签1.</div>
    <div id="myveryownID" class="tab-pane active">标签2的内容</div>
    <div id="w0-tab-3-dd-0" class="tab-pane">下拉标签1的内容.</div>
    <div id="w0-tab-3-dd-1" class="tab-pane">下拉标签2的内容.</div>
</div>
```


### 垂直标签页

为`.nav-tabs`添加`.nav-stacked`类样式获得垂直排列的标签导航, 使用 [栅格](#basic/grid) 来使得导航和标签页内容水平排列.

```php
echo Tab::widget([
    'options' => ['class' => 'nav-stacked'],
    'template' => "<div class='row'><div class='col-xs-3'>{tab}</div><div class='col-xs-9'>{content}</div></div>",
    'items' => [
        ['label' => '标签1', 'content' => '我是标签1.'],
        ['label' => '标签2', 'content' => '标签2的内容', 'paneOptions' => ['id' => 'myveryownID'], 'active' => true],
        ['label' => '标签链接', 'url' => 'http://www.example.com', 'linkOptions' => ['target' => '_blank']],
        ['label' => '下拉标签',  'items' => [
            ['label' => '下拉标签1', 'content' => '下拉标签1的内容.'],
            ['label' => '下拉标签2', 'content' => '下拉标签2的内容.']
        ]]
    ]
]);
```
渲染结果:
```html
<div class="row">
    <div class="col-xs-3">
        <ul id="w0" class="nav nav-tabs nav-stacked">
            <li><a href="#w0-tab-0" data-toggle="tab">标签1</a></li>
            <li class="active"><a href="#myveryownID" data-toggle="tab">标签2</a></li>
            <li><a href="http://www.example.com" target="_blank">标签链接</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">下拉标签 <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#w0-tab-3-dd-0" data-toggle="tab">下拉标签1</a></li>
                    <li><a href="#w0-tab-3-dd-1" data-toggle="tab">下拉标签2</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="col-xs-9">
        <div class="tab-content">
            <div id="w0-tab-0" class="tab-pane fade">我是标签1.</div>
            <div id="myveryownID" class="tab-pane active fade in">标签2的内容</div>
            <div id="w0-tab-3-dd-0" class="tab-pane fade">下拉标签1的内容.</div>
            <div id="w0-tab-3-dd-1" class="tab-pane fade">下拉标签2的内容.</div>
        </div>
    </div>
</div>
```


### 方法

#### 显示标签页内容

 - `$().tab('show')`

用于手动显示当前元素指示的标签页内容.

```js
$('#myTabLink').tab('show');
```

### 事件

当显示一个新的标签页时, 这些事件会被触发:

 - `show.zui.tab`: 当前标签页在显示时触发;
 - `shown.zui.tab`: 当前标签页在显示后(动画执行完毕)触发.

#### 事件示例

```php
echo Tab::widget([
    'items' => [
        ['label' => '标签1', 'content' => '我是标签1.'],
        ['label' => '标签2', 'content' => '标签2的内容', 'paneOptions' => ['id' => 'myveryownID'], 'active' => true],
        ['label' => '标签链接', 'url' => 'http://www.example.com', 'linkOptions' => ['target' => '_blank']],
        ['label' => '下拉标签',  'items' => [
            ['label' => '下拉标签1', 'content' => '下拉标签1的内容.'],
            ['label' => '下拉标签2', 'content' => '下拉标签2的内容.']
        ]]
    ],
    'clientEvents' => [
        'shown.zui.tab' => 'function(e){
  console.log("当前被激活的标签页", e.target);
  console.log("上一个标签页", e.relatedTarget);
}',
    ]
]);
```
渲染结果:
```html
<ul id="w0" class="nav nav-tabs">
    <li><a href="#w0-tab-0" data-toggle="tab">标签1</a></li>
    <li class="active"><a href="#myveryownID" data-toggle="tab">标签2</a></li>
    <li><a href="http://www.example.com" target="_blank">标签链接</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown">下拉标签 <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#w0-tab-3-dd-0" data-toggle="tab">下拉标签1</a></li>
            <li><a href="#w0-tab-3-dd-1" data-toggle="tab">下拉标签2</a></li>
        </ul>
    </li>
</ul>
<div class="tab-content">
    <div id="w0-tab-0" class="tab-pane fade">我是标签1.</div>
    <div id="myveryownID" class="tab-pane active fade in">标签2的内容</div>
    <div id="w0-tab-3-dd-0" class="tab-pane fade">下拉标签1的内容.</div>
    <div id="w0-tab-3-dd-1" class="tab-pane fade">下拉标签2的内容.</div>
</div>

<script type="text/javascript">jQuery(document).ready(function () {
jQuery('#w0').on('shown.zui.tab', function(e){
  console.log("当前被激活的标签页", e.target);
  console.log("上一个标签页", e.relatedTarget);
});
});</script>
```


需要动态标签页? [标签页管理器](#view/tabs) 提供远程或自定义标签的打开关闭功能.

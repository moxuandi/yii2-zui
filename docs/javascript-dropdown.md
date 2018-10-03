# [JS插件 - 下拉菜单](http://zui.sexy/#javascript/dropdown)

下拉菜单用于实现当用户点击一个元素时弹出一个浮动的菜单层.

### 结构

下拉菜单由触发元素(例如按钮)和浮动(`.dropdown-menu`)组成. 你需要为触发元素添加`[data-toggle="dropdown"]`属性.

触发元素和浮动菜单`.dropdown-menu`通常都需要放置在`.dropdown`容器元素内, 但也可以使用任何`position: relative`的元素作为下拉菜单容器.

#### 示例

```php
echo ButtonDropdown::widget([
    'label' => '菜单按钮',
    'options' => ['class' => 'dropdown'],
    'dropdown' => [
        'items' => [
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#'],
            ['label' => '更多操作', 'url' => '#']
        ]
    ]
]);
```
渲染结果:
```html
<div class="dropdown">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">菜单按钮 <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">操作</a></li>
        <li><a href="#">另一个操作</a></li>
        <li><a href="#">更多操作</a></li>
    </ul>
</div>
```


#### 自动展开

默认情况下当点击触发按钮时会展开下拉菜单, 如果需要自动(在鼠标悬停时展开), 只需要为`.dropdown`增加`.dropdown-hover`类.

```php
echo ButtonDropdown::widget([
    'label' => '鼠标悬停展开菜单按钮',
    'options' => ['class' => 'dropdown dropdown-hover'],
    'dropdown' => [
        'items' => [
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#'],
            ['label' => '更多操作', 'url' => '#']
        ]
    ]
]);
```
渲染结果:
```html
<div class="dropdown dropdown-hover">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">鼠标悬停展开菜单按钮 <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">操作</a></li>
        <li><a href="#">另一个操作</a></li>
        <li><a href="#">更多操作</a></li>
    </ul>
</div>
```


### 使用按钮组

在[组件 - 按钮组](component-buttongroup.md)`.btn-group`元素可以直接作为下拉菜单父级容器, 从而不需要额外的`.dropdown`元素.

```php
// 按钮组
echo ButtonDropdown::widget([
    'label' => '菜单按钮',
    'buttonOptions' => ['class' => 'btn-primary'],
    'dropdown' => [
        'items' => [
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#'],
            ['label' => '更多操作', 'url' => '#']
        ]
    ]
]);

// 分割按钮组
echo ButtonDropdown::widget([
    'label' => '菜单按钮',
    'buttonOptions' => ['class' => 'btn-danger'],
    'split' => true,
    'dropdown' => [
        'items' => [
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#'],
            ['label' => '更多操作', 'url' => '#']
        ]
    ]
]);
```
渲染结果:
```html
<!-- 按钮组 -->
<div class="btn-group">
    <button type="button" class="btn dropdown-toggle btn-primary" data-toggle="dropdown">菜单按钮 <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">操作</a></li>
        <li><a href="#">另一个操作</a></li>
        <li><a href="#">更多操作</a></li>
    </ul>
</div>

<!-- 分割按钮组 -->
<div class="btn-group">
    <button type="button" class="btn btn-danger">菜单按钮</button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">操作</a></li>
        <li><a href="#">另一个操作</a></li>
        <li><a href="#">更多操作</a></li>
    </ul>
</div>
```

使用按钮组来实现下拉菜单的一个好处就是多个按钮组下拉菜单可以在一行显示.


### 下拉菜单三角图标

在下拉菜单按钮内包含`<span class="caret"></span>`来显示一个三角图标. 你也可以使用 [控件 - 字体图标](control-icon.md) 来替代.

```php
// 三角图标(默认)
echo ButtonDropdown::widget([
    'label' => '菜单按钮',
    'dropdown' => [
        'items' => [
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#'],
            ['label' => '更多操作', 'url' => '#']
        ]
    ]
]);

// 三角图标(自定义)
echo ButtonDropdown::widget([
    'label' => '菜单按钮',
    'caret' => '<i class="icon-caret-down"></i>',
    'dropdown' => [
        'items' => [
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#'],
            ['label' => '更多操作', 'url' => '#']
        ]
    ]
]);

// 三角图标(自定义)
echo ButtonDropdown::widget([
    'label' => '菜单按钮',
    'caret' => '<i class="icon-ellipsis-v"></i>',
    'dropdown' => [
        'items' => [
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#'],
            ['label' => '更多操作', 'url' => '#']
        ]
    ]
]);
```
渲染结果:
```html
<!-- 三角图标(默认) -->
<div class="btn-group">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">菜单按钮 <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">操作</a></li>
        <li><a href="#">另一个操作</a></li>
        <li><a href="#">更多操作</a></li>
    </ul>
</div>

<!-- 三角图标(自定义) -->
<div class="btn-group">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">菜单按钮 <i class="icon-caret-down"></i></button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">操作</a></li>
        <li><a href="#">另一个操作</a></li>
        <li><a href="#">更多操作</a></li>
    </ul>
</div>

<!-- 三角图标(自定义) -->
<div class="btn-group">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">菜单按钮 <i class="icon-ellipsis-v"></i></button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">操作</a></li>
        <li><a href="#">另一个操作</a></li>
        <li><a href="#">更多操作</a></li>
    </ul>
</div>
```


### 标题、分割线和活动、禁用的菜单项

在`.dropdown-menu`内使用`.dropdown-header`来显示标题, 使用`.divider`来显示分割线.

为菜单项`<li>`添加`.active`类即可获得活动外观, 添加`.disabled`类即可获得禁用外观.

```php
echo ButtonDropdown::widget([
    'label' => '菜单按钮',
    'dropdown' => [
        'items' => [
            '<li class="dropdown-header">下拉菜单标题</li>',
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#', 'options' => ['class' => 'active']],
            '<li class="divider"></li>',
            '<li class="dropdown-header">更多操作</li>',
            ['label' => '修改', 'url' => '#', 'options' => ['class' => 'disabled']]
        ]
    ]
]);
```
渲染结果:
```html
<div class="btn-group">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">菜单按钮 <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">下拉菜单标题</li>
        <li><a href="#">操作</a></li>
        <li class="active"><a href="#">另一个操作</a></li>
        <li class="divider"></li>
        <li class="dropdown-header">更多操作</li>
        <li class="disabled"><a href="#">修改</a></li>
    </ul>
</div>
```


### 浮动方向

通常情况下, 下拉菜单会在触发元素下发弹出, 可以为下拉菜单父级元素(`.dropdown`或`.btn-group`)添加`.dropup`类时下拉菜单在触发元素上方弹出.

在水平方向上下拉菜单左侧会与触发元素的左侧对齐, 为`.dorpdown-menu`添加`.pull-right`可以使得下拉菜单的右侧与触发元素的右侧对齐.

```php
// 下方左侧对齐(默认)
echo ButtonDropdown::widget([
    'label' => '下方左侧对齐',
    'dropdown' => [
        'items' => [
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '更多操作', 'url' => '#']
        ]
    ]
]);

// 上方左侧对齐
echo ButtonDropdown::widget([
    'label' => '上方左侧对齐',
    'options' => ['class' => 'btn-group dropup'],
    //'options' => ['class' => 'dropup'],
    'dropdown' => [
        'items' => [
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '更多操作', 'url' => '#']
        ]
    ]
]);

// 下方右侧对齐
echo ButtonDropdown::widget([
    'label' => '下方右侧对齐',
    'dropdown' => [
        'options' => ['class' => 'pull-right'],
        'items' => [
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '更多操作', 'url' => '#']
        ]
    ]
]);

// 上方右侧对齐
echo ButtonDropdown::widget([
    'label' => '上方右侧对齐',
    'options' => ['class' => 'btn-group dropup'],
    'dropdown' => [
        'options' => ['class' => 'pull-right'],
        'items' => [
            ['label' => '操作', 'url' => '#'],
            ['label' => '另一个操作', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '更多操作', 'url' => '#']
        ]
    ]
]);
```
渲染结果:
```html
<!-- 下方左侧对齐(默认) -->
<div class="btn-group">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">下方左侧对齐 <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">操作</a></li>
        <li><a href="#">另一个操作</a></li>
        <li class="divider"></li>
        <li><a href="#">更多操作</a></li>
    </ul>
</div>

<!-- 上方左侧对齐 -->
<div class="btn-group dropup">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">上方左侧对齐 <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">操作</a></li>
        <li><a href="#">另一个操作</a></li>
        <li class="divider"></li>
        <li><a href="#">更多操作</a></li>
    </ul>
</div>

<!-- 下方右侧对齐 -->
<div class="btn-group">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">下方右侧对齐 <span class="caret"></span></button>
    <ul class="dropdown-menu pull-right" role="menu">
        <li><a href="#">操作</a></li>
        <li><a href="#">另一个操作</a></li>
        <li class="divider"></li>
        <li><a href="#">更多操作</a></li>
    </ul>
</div>

<!-- 上方右侧对齐 -->
<div class="btn-group dropup">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">上方右侧对齐 <span class="caret"></span></button>
    <ul class="dropdown-menu pull-right" role="menu">
        <li><a href="#">操作</a></li>
        <li><a href="#">另一个操作</a></li>
        <li class="divider"></li>
        <li><a href="#">更多操作</a></li>
    </ul>
</div>
```


### 多级子菜单

可以在`.dropdown-menu`内的`<li>`内包含另一个`.dropdown-menu`从而实现多级子菜单. 包含子菜单`<li>`需要添加额外的类`.dropdown-submenu`.

一般情况下子菜单会在菜单项的右侧显示, 但也可以为作为子菜单的`.dropdown-menu`添加`.pull-left`类来使得子菜单在左侧显示.

```php
echo ButtonDropdown::widget([
    'label' => '菜单按钮',
    'dropdown' => [
        'items' => [
            ['label' => '打开', 'url' => '#', 'items' => [
                ['label' => '运行', 'url' => '#'],
                ['label' => '在终端中打开', 'url' => '#'],
                ['label' => '在编辑器中打开', 'url' => '#']
            ]],
            ['label' => '一组操作', 'url' => '#', 'items' => [
                ['label' => '修改', 'url' => '#', 'items' => [
                    ['label' => '修改标题', 'url' => '#'],
                    ['label' => '更新内容', 'url' => '#'],
                    ['label' => '转移', 'url' => '#']
                ]],
                ['label' => '删除', 'url' => '#', 'items' => [
                    ['label' => '移动到回收站', 'url' => '#'],
                    ['label' => '直接删除', 'url' => '#']
                ]],
                ['label' => '撤销', 'url' => '#']
            ]],
            ['label' => '另一组操作', 'url' => '#', 'items' => [
                ['label' => '评审', 'url' => '#'],
                ['label' => '计划', 'url' => '#'],
                ['label' => '关闭', 'url' => '#']
            ]],
            '<li class="divider"></li>',
            ['label' => '在左侧显示', 'url' => '#', 'items' => [
                ['label' => '复制', 'url' => '#'],
                ['label' => '粘贴', 'url' => '#'],
                ['label' => '剪切', 'url' => '#']
            ], 'submenuOptions' => ['class' => 'pull-left']]
        ]
    ]
]);
```
渲染结果:
```html
<div class="btn-group">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">菜单按钮 <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
        <li class="dropdown-submenu">
            <a href="#">打开</a>
            <ul class="dropdown-menu">
                <li><a href="#">运行</a></li>
                <li><a href="#">在终端中打开</a></li>
                <li><a href="#">在编辑器中打开</a></li>
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a href="#">一组操作</a>
            <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                    <a href="#">修改</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">修改标题</a></li>
                        <li><a href="#">更新内容</a></li>
                        <li><a href="#">转移</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">删除</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">移动到回收站</a></li>
                        <li><a href="#">直接删除</a></li>
                    </ul>
                </li>
                <li><a href="#">撤销</a></li>
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a href="#">另一组操作</a>
            <ul class="dropdown-menu">
                <li><a href="#">评审</a></li>
                <li><a href="#">计划</a></li>
                <li><a href="#">关闭</a></li>
            </ul>
        </li>
        <li class="divider"></li>
        <li class="dropdown-submenu">
            <a href="#">在左侧显示</a>
            <ul class="dropdown-menu pull-left">
                <li><a href="#">复制</a></li>
                <li><a href="#">粘贴</a></li>
                <li><a href="#">剪切</a></li>
            </ul>
        </li>
    </ul>
</div>
```


### 自定义菜单 ----- 未实现

通常情况下下拉菜单列表使用`<ul>`元素, 你也可以替换为其他元素或内容.


### 在导航或导航条中使用 ----- 未实现

在[组件 - 导航](component-nav.md)和[组件 - 导航条](component-navbar.md)中使用下拉菜单也非常方便, 直接使用导航条目`<li>`作为下拉菜单父级容器并为其添加`.dropdown`类.

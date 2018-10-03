# [视图 - 树形菜单](http://zui.sexy/#view/tree)

树形菜单提供一种展示层级关系(例如文件系统目录)菜单的视图.

### 综合示例

下方展示了一个树形菜单, 当一个链接包含一个子菜单时, 通过点击链接左侧的图标可以展开内部子菜单. 子菜单中的链接也可以包含另一个子菜单.

要构建一个树形菜单, 只需要按层级嵌套`<ul>`, 并为顶层节点添加`[data-ride="tree"]`属性.

```php
// 树形菜单的数据项
$items = [
    ['label' => '水果', 'url' => '#', 'items' => [
        ['label' => '苹果', 'url' => '#'],
        ['label' => '热带水果', 'url' => '#', 'items' => [
            ['label' => '香蕉', 'url' => '#'],
            ['label' => '芒果', 'url' => '#'],
            ['label' => '椰子', 'url' => '#'],
            ['label' => '菠萝', 'url' => '#']
        ]],
        ['label' => '梨子', 'url' => '#'],
        ['label' => '草莓', 'url' => '#'],
        ['label' => '杏', 'url' => '#'],
        ['label' => '桃子', 'url' => '#'],
        ['label' => '梅子', 'url' => '#']
    ]],
    ['label' => '蔬菜', 'url' => '#', 'items' => [
        ['label' => '我的菜', 'url' => '#', 'items' => [
            ['label' => '青菜', 'url' => '#'],
            ['label' => '娃娃菜', 'url' => '#'],
            ['label' => '菠菜', 'url' => '#'],
            ['label' => '甘蓝', 'url' => '#']
        ]],
        ['label' => '你的瓜', 'url' => '#', 'items' => [
            ['label' => '黄瓜', 'url' => '#'],
            ['label' => '南瓜', 'url' => '#'],
            ['label' => '丝瓜', 'url' => '#'],
            ['label' => '苦瓜', 'url' => '#'],
            ['label' => '木瓜', 'url' => '#']
        ]],
        ['label' => '白蓝', 'url' => '#'],
        ['label' => '土豆', 'url' => '#'],
        ['label' => '茄子', 'url' => '#']
    ]],
    ['label' => '甜点', 'url' => '#', 'items' => [
        ['label' => '蛋糕', 'url' => '#'],
        ['label' => '冰淇淋', 'url' => '#'],
        ['label' => '果冻', 'url' => '#']
    ]],
    ['label' => '坚果', 'url' => '#', 'items' => [
        ['label' => '瓜子', 'url' => '#']
    ], 'open' => true],
    ['label' => '饮料', 'url' => '#', 'items' => [
        ['label' => '咖啡', 'url' => '#'],
        ['label' => '茶', 'url' => '#']
    ]],
    ['label' => '酒水', 'url' => '#'],
    ['label' => '粥饭']
];

echo Tree::widget(['items' => $items]);
```
渲染结果:
```html
<ul id="w0" class="tree" data-ride="tree" data-idx="0">
    <li class="has-list" data-idx="1" data-id="1">
        <i class="list-toggle icon"></i><a href="#">水果</a>
        <ul data-idx="1">
            <li data-idx="1" data-id="1-1"><a href="#">苹果</a></li>
            <li class="has-list" data-idx="2" data-id="1-2">
                <i class="list-toggle icon"></i><a href="#">热带水果</a>
                <ul data-idx="2">
                    <li data-idx="1" data-id="1-2-1"><a href="#">香蕉</a></li>
                    <li data-idx="2" data-id="1-2-2"><a href="#">芒果</a></li>
                    <li data-idx="3" data-id="1-2-3"><a href="#">椰子</a></li>
                    <li data-idx="4" data-id="1-2-4"><a href="#">菠萝</a></li>
                </ul>
            </li>
            <li data-idx="3" data-id="1-3"><a href="#">梨子</a></li>
            <li data-idx="4" data-id="1-4"><a href="#">草莓</a></li>
            <li data-idx="5" data-id="1-5"><a href="#">杏</a></li>
            <li data-idx="6" data-id="1-6"><a href="#">桃子</a></li>
            <li data-idx="7" data-id="1-7"><a href="#">梅子</a></li>
        </ul>
    </li>
    <li class="has-list" data-idx="2" data-id="2">
        <i class="list-toggle icon"></i><a href="#">蔬菜</a>
        <ul data-idx="2">
            <li class="has-list" data-idx="1" data-id="2-1">
                <i class="list-toggle icon"></i><a href="#">我的菜</a>
                <ul data-idx="1">
                    <li data-idx="1" data-id="2-1-1"><a href="#">青菜</a></li>
                    <li data-idx="2" data-id="2-1-2"><a href="#">娃娃菜</a></li>
                    <li data-idx="3" data-id="2-1-3"><a href="#">菠菜</a></li>
                    <li data-idx="4" data-id="2-1-4"><a href="#">甘蓝</a></li>
                </ul>
            </li>
            <li class="has-list" data-idx="2" data-id="2-2">
                <i class="list-toggle icon"></i><a href="#">你的瓜</a>
                <ul data-idx="2">
                    <li data-idx="1" data-id="2-2-1"><a href="#">黄瓜</a></li>
                    <li data-idx="2" data-id="2-2-2"><a href="#">南瓜</a></li>
                    <li data-idx="3" data-id="2-2-3"><a href="#">丝瓜</a></li>
                    <li data-idx="4" data-id="2-2-4"><a href="#">苦瓜</a></li>
                    <li data-idx="5" data-id="2-2-5"><a href="#">木瓜</a></li>
                </ul>
            </li>
            <li data-idx="3" data-id="2-3"><a href="#">白蓝</a></li>
            <li data-idx="4" data-id="2-4"><a href="#">土豆</a></li>
            <li data-idx="5" data-id="2-5"><a href="#">茄子</a></li>
        </ul>
    </li>
    <li class="has-list" data-idx="3" data-id="3">
        <i class="list-toggle icon"></i><a href="#">甜点</a>
        <ul data-idx="3">
            <li data-idx="1" data-id="3-1"><a href="#">蛋糕</a></li>
            <li data-idx="2" data-id="3-2"><a href="#">冰淇淋</a></li>
            <li data-idx="3" data-id="3-3"><a href="#">果冻</a></li>
        </ul>
    </li>
    <li class="has-list open in" data-idx="4" data-id="4">
        <i class="list-toggle icon"></i><a href="#">坚果</a>
        <ul data-idx="4">
            <li data-idx="1" data-id="4-1" class="tree-single-item"><a href="#">瓜子</a></li>
        </ul>
    </li>
    <li class="has-list" data-idx="5" data-id="5">
        <i class="list-toggle icon"></i><a href="#">饮料</a>
        <ul data-idx="5">
            <li data-idx="1" data-id="5-1"><a href="#">咖啡</a></li>
            <li data-idx="2" data-id="5-2"><a href="#">茶</a></li>
        </ul>
    </li>
    <li data-idx="6" data-id="6"><a href="#">酒水</a></li>
    <li data-idx="7" data-id="7"><a href="#">粥饭</a></li>
</ul>
```


## 外观选项

### 在层级菜单之间显示连接线(`.tree-lines`)

```php
echo Tree::widget([
    'items' => $items,
    'options' => [
        'class' => 'tree-lines'
    ]
]);
```
渲染结果:
```html
<ul id="w0" class="tree tree-lines" data-ride="tree" data-idx="0">
    ……
</ul>
```


### 使用不同的图标

#### 内置图标类型

```php
// 默认
echo Tree::widget([
    'items' => $items,
    'options' => [
        'class' => 'tree-lines'
    ]
]);

// 文件夹(`.tree-folders`)
echo Tree::widget([
    'items' => $items,
    'options' => [
        'class' => 'tree-lines tree-folders'
    ]
]);

// V形(`.tree-chevrons`)
echo Tree::widget([
    'items' => $items,
    'options' => [
        'class' => 'tree-lines tree-chevrons'
    ]
]);

// 直角(`.tree-angles`)
echo Tree::widget([
    'items' => $items,
    'options' => [
        'class' => 'tree-lines tree-angles'
    ]
]);
```
渲染结果:
```html
<!-- 默认 -->
<ul id="w0" class="tree tree-lines" data-ride="tree" data-idx="0">
    ……
</ul>

<!-- 文件夹(`.tree-folders`) -->
<ul id="w0" class="tree tree-lines tree-folders" data-ride="tree" data-idx="0">
    ……
</ul>

<!-- V形(`.tree-chevrons`) -->
<ul id="w0" class="tree tree-lines tree-chevrons" data-ride="tree" data-idx="0">
    ……
</ul>

<!-- 直角(`.tree-angles`) -->
<ul id="w0" class="tree tree-lines tree-angles" data-ride="tree" data-idx="0">
    ……
</ul>
```

#### 使用CSS来自定义图标

```css
.tree-custom-icons > li > .list-toggle:before {content: '\e6dd'}
.tree-custom-icons > li.open > .list-toggle:before {content: '\e6df'}
```


### 启用动画效果(`data-animate="true"`)

```php
echo Tree::widget([
    'items' => $items,
    'options' => [
        'class' => 'tree-lines',
        'data-animate' => 'true'
    ]
]);
```
渲染结果:
```html
<ul id="w0" class="tree tree-lines tree-animate" data-animate="true" data-ride="tree" data-idx="0">
    ……
</ul>
```


### 树形导航菜单

为`.tree`元素增加`.tree-menu`类可以获得树形导航外观.

```php
<nav class="menu" data-ride="menu" style="width: 200px">
echo Tree::widget([
    'options' =>  ['class' => 'tree-menu'],
    'encodeLabels' => false,
    'items' => [
        ['label' => '<i class="icon icon-th"></i>首页', 'url' => '#'],
        ['label' => '<i class="icon icon-user"></i>个人资料', 'url' => '#'],
        ['label' => '<i class="icon icon-time"></i>更新时间', 'url' => '#', 'items' => [
            ['label' => '今天', 'url' => '#'],
            ['label' => '明天', 'url' => '#'],
            ['label' => '昨天', 'url' => '#'],
            ['label' => '本周', 'url' => '#']
        ]],
        ['label' => '<i class="icon icon-trash"></i>垃圾篓', 'url' => '#'],
        ['label' => '<i class="icon icon-list-ul"></i>全部', 'url' => '#'],
        ['label' => '<i class="icon icon-tasks"></i>状态', 'url' => '#', 'open' => true, 'items' => [
            ['label' => '<i class="icon icon-circle-blank"></i>已就绪', 'url' => '#', 'items' => [
                ['label' => '已取消', 'url' => '#'],
                ['label' => '已关闭', 'url' => '#']
            ]],
            ['label' => '<i class="icon icon-play-sign"></i>进行中', 'url' => '#', 'options' => ['class' => 'active']],
            ['label' => '<i class="icon icon-ok-sign"></i>已完成', 'url' => '#']
        ]]
    ]
]);
</nav>
```
渲染结果:
```html
<nav class="menu" data-ride="menu" style="width: 200px">
    <ul id="treeMenu" class="tree tree-menu" data-ride="tree" data-idx="0">
        <li data-idx="1" data-id="1"><a href="#"><i class="icon icon-th"></i>首页</a></li>
        <li data-idx="2" data-id="2"><a href="#"><i class="icon icon-user"></i>个人资料</a></li>
        <li class="has-list" data-idx="3" data-id="3">
            <i class="list-toggle icon"></i><a href="#"><i class="icon icon-time"></i>更新时间</a>
            <ul data-idx="3">
                <li data-idx="1" data-id="3-1"><a href="#">今天</a></li>
                <li data-idx="2" data-id="3-2"><a href="#">明天</a></li>
                <li data-idx="3" data-id="3-3"><a href="#">昨天</a></li>
                <li data-idx="4" data-id="3-4"><a href="#">本周</a></li>
            </ul>
        </li>
        <li data-idx="4" data-id="4"><a href="#"><i class="icon icon-trash"></i>垃圾篓</a></li>
        <li data-idx="5" data-id="5"><a href="#"><i class="icon icon-list-ul"></i>全部</a></li>
        <li class="has-list open in" data-idx="6" data-id="6">
            <i class="list-toggle icon"></i><a href="#"><i class="icon icon-tasks"></i>状态</a>
            <ul data-idx="6">
                <li class="has-list" data-idx="1" data-id="6-1">
                    <i class="list-toggle icon"></i><a href="#"><i class="icon icon-circle-blank"></i>已就绪</a>
                    <ul data-idx="1">
                        <li data-idx="1" data-id="6-1-1"><a href="#">已取消</a></li>
                        <li data-idx="2" data-id="6-1-2"><a href="#">已关闭</a></li>
                    </ul>
                </li>
                <li class="active" data-idx="2" data-id="6-2"><a href="#"><i class="icon icon-play-sign"></i>进行中</a></li>
                <li data-idx="3" data-id="6-3"><a href="#"><i class="icon icon-ok-sign"></i>已完成</a></li>
            </ul>
        </li>
    </ul>
</nav>

<!-- 手动通过点击模拟高亮菜单项 -->
<script>
$('#treeMenu').on('click', 'a', function() {
    $('#treeMenu li.active').removeClass('active');
    $(this).closest('li').addClass('active');
});
</script>
```


### 使用`data-*`传递参数

```php
echo Tree::widget([
    'items' => $items,
    'options' => [
        'class' => 'tree-lines',
        'data-animate' => 'true',  // 动画效果
        'data-initial-state' => 'normal',  // 初始状态: 默认, 自动根据dom结构决定
        'data-initial-state' => 'expand',  // 初始状态: 全部展开
        'data-initial-state' => 'collapse',  // 初始状态: 全部折叠 
        'data-initial-state' => 'preserve',  // 初始状态: 从本地存储还原用户上次操作状态
    ]
]);
```

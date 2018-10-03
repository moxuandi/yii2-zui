# [JS插件 - 折叠](http://zui.sexy/#javascript/collapse)

折叠插件使用直观的动画来展示或显示内容.

### 结构

要实现折叠, 一般需要两个元素:

 - 折叠内容元素, 包含使用动画来切换显示或隐藏的内容, 需要添加`.collapse`类, 如果被折叠内容在一开始就是显示的, 还需要为其添加`.in`类;
 - 触发元素, 需要添加`[data-toggle="collapse"]`属性, 并且使用`[href]`或`[data-target="#selector"]`属性来自定用于折叠内容元素.

多个折叠如果放置在同一个父级容器元素内, 可以创建一个折叠分组(手风琴效果), 只需要为每个触发元素添加`[data-parent="#selector"]`属性, 其属性值指向父级容器即可.

### 折叠分组

```php
echo Collapse::widget([
    'items' => [
        [
            'label' => '直接使用 href 属性',
            'content' => '<p>被折叠元素内容. </p><p>多个触发元素可以指向同一个折叠内容.</p>'
        ],
        [
            'label' => '使用 data-target 属性',
            'tag' => 'button',
            'content' => '<p>被折叠元素内容. </p><p>多个触发元素可以指向同一个折叠内容.</p>'
        ],
    ],
]);
```
渲染结果:
```html
<div id="w0">
    <p><a class="btn" href="#w0-collapse-1" data-toggle="collapse" data-parent="#w0">直接使用 href 属性</a></p>
    <div id="w0-collapse-1" class="collapse"><p>被折叠元素内容.</p><p>多个触发元素可以指向同一个折叠内容.</p></div>
    <p><button type="button" class="btn" data-toggle="collapse" data-parent="#w0" data-target="#w0-collapse-2">使用 data-target 属性</button></p>
    <div id="w0-collapse-2" class="collapse"><p>被折叠元素内容.</p><p>多个触发元素可以指向同一个折叠内容.</p></div>
</div>
```


### 结合面板组使用

```php
echo CollapsePanel::widget([
    'items' => [
        '折叠面板' => '折叠面板内容',
        ['label' => '折叠面板 1', 'content' => '折叠面板内容 1', 'active' => true],
        ['label' => '折叠面板 2', 'content' => '折叠面板内容 2', 'panelCollapseOptions' => ['id' => 'collapseTwo']],
        ['label' => '折叠面板 3', 'content' => [
            '折叠面板内容 3-1',
            '折叠面板内容 3-2',
            ['label' => '折叠面板内容 3-3', 'url' => '#']
        ]],
        ['label' => '折叠面板 4', 'content' => '折叠面板内容 4', 'footer' => '折叠面板脚注 4'],
    ],
]);
```
渲染结果:
```html
<div id="w0" class="panel-group">
    <div class="panel">
        <div class="panel-heading">
            <h4 class="panel-title"><a class="collapse-toggle" href="#w0-collapse-1" data-toggle="collapse" data-parent="#w0">折叠面板</a></h4>
        </div>
        <div id="w0-collapse-1" class="panel-collapse collapse">
            <div class="panel-body">折叠面板内容</div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-heading">
            <h4 class="panel-title"><a class="collapse-toggle" href="#w0-collapse-2" data-toggle="collapse" data-parent="#w0">折叠面板 1</a></h4>
        </div>
        <div id="w0-collapse-2" class="panel-collapse collapse in">
            <div class="panel-body">折叠面板内容 1</div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-heading">
            <h4 class="panel-title"><a class="collapse-toggle" href="#collapseTwo" data-toggle="collapse" data-parent="#w0">折叠面板 2</a></h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">折叠面板内容 2</div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-heading">
            <h4 class="panel-title"><a class="collapse-toggle" href="#w0-collapse-4" data-toggle="collapse" data-parent="#w0">折叠面板 3</a></h4>
        </div>
        <div id="w0-collapse-4" class="panel-collapse collapse">
            <ul class="list-group">
                <li class="list-group-item">折叠面板内容 3-1</li>
                <li class="list-group-item">折叠面板内容 3-2</li>
                <li class="list-group-item"><a href="#">折叠面板内容 3-3</a></li>
            </ul>
        </div>
    </div>
    <div class="panel">
        <div class="panel-heading">
            <h4 class="panel-title"><a class="collapse-toggle" href="#w0-collapse-5" data-toggle="collapse" data-parent="#w0">折叠面板 4</a></h4>
        </div>
        <div id="w0-collapse-5" class="panel-collapse collapse">
            <div class="panel-body">折叠面板内容 4</div>
            <div class="panel-footer">折叠面板脚注 4</div>
        </div>
    </div>
</div>
```

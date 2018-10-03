# [JS插件 - 对话框触发器](http://zui.sexy/#javascript/modaltrigger)

对话框触发器允许你不需要书写静态对话框HTML, 直接使用触发按钮或者一行Javascript代码即可让一个全新的对话框展现. 支持使用Ajax从远程获取内容，或者通过iframe加载任何页面内容，当然不使用远程内容，直接使用本地内容也是很方便。

### 加载远程内容

这里提供两种方法(`Ajax`和`iframe`)来加载远程内容, 使用起来几乎似乎没有任何区别, 你只需要确保远程地址所提供的内容是正确的类型.

在获取远程内容到显示的过程中, 会显示正在加载的图标动画.

#### 使用Ajax

使用`data-remote="(ajax get url)"`属性来指定`Ajax`片段的获取地址. 或者同时指定`data-type="ajax"`和`data-url="(ajax get url)"`属性.

```php
// 使用 data-remote 属性
echo ModalTrigger::widget([
    'label' => 'Ajax对话框',
    'options' => [
        'class' => 'btn-primary',
        'data-remote' => Url::to(['site/ajax'])
    ]
]);

// 使用 data-type 和 data-url 属性
echo ModalTrigger::widget([
    'label' => 'Ajax对话框',
    'options' => [
        'class' => 'btn-primary',
        'data-type' => 'ajax',
        'data-url' => Url::to(['site/ajax'])
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo ModalTrigger::widget([
    'label' => 'Ajax对话框',
    'options' => ['class' => 'btn-primary'],
    'clientOptions' => [
        'remote' => Url::to(['site/ajax']),
        //'type' => 'ajax',
        //'url' => Url::to(['site/ajax'])
    ]
]);
```
渲染结果:
```html
<!-- 使用 data-remote 属性 -->
<button type="button" id="w0" class="btn btn-primary" data-remote="site/ajax.html" data-toggle="modal">Ajax对话框</button>

<!-- 使用 data-type 和 data-url 属性 -->
<button type="button" id="w1" class="btn btn-primary" data-type="ajax" data-url="site/ajax.html" data-toggle="modal">Ajax对话框</button>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w2" class="btn btn-primary" data-toggle="modal">Ajax对话框(Javascript)</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w2').modalTrigger({"remote":"site/ajax.html"});
});</script>
```

在返回的`Ajax`片段中, 你可以包含一个完整的`.modal-dialog`内容, 或者仅包含`.modal-content`, 甚至不是任何静态modal结构, 触发器会根据所包含的内容自动补全对话框的缺失部分.

#### 使用iframe(内嵌框架)

使用`data-iframe="(iframe url)"`属性来指定远程页面内容获取地址. 或者同时指定`data-type="iframe"`和`data-url="(iframe url)"`属性.

```php
// 使用 data-iframe 属性
echo ModalTrigger::widget([
    'label' => 'iframe对话框',
    'options' => [
        'class' => 'btn-primary',
        'data-iframe' => Url::to(['site/iframe'])
    ]
]);

// 使用 data-type 和 data-url 属性
echo ModalTrigger::widget([
    'label' => 'iframe对话框',
    'options' => [
        'class' => 'btn-primary',
        'data-type' => 'iframe',
        'data-url' => Url::to(['site/iframe'])
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo ModalTrigger::widget([
    'label' => 'iframe对话框',
    'options' => ['class' => 'btn-primary'],
    'clientOptions' => [
        'iframe' => Url::to(['site/iframe']),
        //'type' => 'iframe',
        //'url' => Url::to(['site/iframe'])
    ]
]);
```
渲染结果:
```html
<!-- 使用 data-iframe 属性 -->
<button type="button" id="w0" class="btn btn-primary" data-iframe="site/iframe.html" data-toggle="modal">iframe对话框</button>

<!-- 使用 data-type 和 data-url 属性 -->
<button type="button" id="w1" class="btn btn-primary" data-type="iframe" data-url="site/iframe.html" data-toggle="modal">iframe对话框</button>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w2" class="btn btn-primary" data-toggle="modal">iframe对话框</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w2').modalTrigger({"iframe":"site/iframe.html"});
});</script>
```


### 加载自定义内容

通过定义`custom`属性可以更灵活的为对话框更新内容.

#### 指定内容文本

最简单的方法是为`custom`指定内容文本即可. 同样可以使用`data-custom`属性.

```php
// 使用 data-custom 属性
echo ModalTrigger::widget([
    'label' => '指定内容文本',
    'options' => [
        'class' => 'btn-primary',
        'data-custom' => '<h1>此内容是自定义的</h1><p>哈哈:)</p>'
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo ModalTrigger::widget([
    'label' => '指定内容文本',
    'options' => ['class' => 'btn-primary'],
    'clientOptions' => ['custom' => '<h1>此内容是自定义的</h1><p>哈哈:)</p>']
]);
```
渲染结果:
```html
<!-- 使用 data-custom 属性 -->
<button type="button" id="w0" class="btn btn-primary" data-custom="<h1>此内容是自定义的</h1><p>哈哈:)</p>" data-toggle="modal">指定内容文本</button>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w1" class="btn btn-primary" data-toggle="modal">指定内容文本</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w1').modalTrigger({"custom":"<h1>此内容是自定义的</h1><p>哈哈:)</p>"});
});</script>
```

#### 指定页面元素作为内容

通过指定一个 jQuery 选择器名称来获取其内容作为对话框的内容.

```php
// 页面元素
<div id="myModalAlert" class="alert alert-success with-icon">
    <i class="icon-ok"></i>
    <div class="content">我希望能够在对话框看到此消息.</div>
</div>

// 使用 data-custom 属性
echo ModalTrigger::widget([
    'label' => '指定页面元素的内容',
    'options' => [
        'class' => 'btn-primary',
        'data-custom' => '#myModalAlert'
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo ModalTrigger::widget([
    'label' => '指定页面元素的内容',
    'options' => ['class' => 'btn-primary'],
    'clientOptions' => ['custom' => '#myModalAlert']
]);
```
渲染结果:
```html
<!-- 页面元素 -->
<div id="myModalAlert" class="alert alert-success with-icon">
    <i class="icon-ok"></i>
    <div class="content">我希望能够在对话框看到此消息.</div>
</div>

<!-- 使用 data-custom 属性 -->
<button type="button" id="w0" class="btn btn-primary" data-custom="#myModalAlert" data-toggle="modal">指定页面元素的内容</button>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w1" class="btn btn-primary" data-toggle="modal">指定页面元素的内容</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w1').modalTrigger({"custom":"#myModalAlert"});
});</script>
```

#### 自动调整位置

当对话框内的内容发生更改导致对话框尺寸发生改变时, 对话框会根据设置自动调整位置.

自动调整位置适合任何形式的对话框.

```php
// 使用 data-custom 属性
echo ModalTrigger::widget([
    'label' => '测试自动调整位置',
    'options' => [
        'class' => 'btn-primary',
        'data-custom' => "<div contenteditable='true' style='height: auto' class='form-control'>输入一些内容和换行来更改对话框大小</div>"
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo ModalTrigger::widget([
    'label' => '测试自动调整位置',
    'options' => ['class' => 'btn-primary'],
    'clientOptions' => [
        'custom' => "<div contenteditable='true' style='height: auto' class='form-control'>输入一些内容和换行来更改对话框大小</div>"
    ]
]);
```
渲染结果:
```html
<!-- 使用 data-custom 属性 -->
<button type="button" id="w0" class="btn btn-primary" data-custom="<div contenteditable='true' style='height: auto' class='form-control'>输入一些内容和换行来更改对话框大小</div>" data-toggle="modal">测试自动调整位置</button>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w1" class="btn btn-primary" data-toggle="modal">测试自动调整位置</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w1').modalTrigger({"custom":"<div contenteditable=\u0027true\u0027 style=\u0027height: auto\u0027 class=\u0027form-control\u0027>输入一些内容和换行来更改对话框大小</div>"});
});</script>
```

#### 全屏对话框(`fullscreen`), 大对话框(`lg`), 小对话框(`sm`), 标准对话框(`md`,默认)

```php
// 使用 data-size 属性
echo ModalTrigger::widget([
    'label' => '全屏对话框',
    'options' => [
        'class' => 'btn-primary',
        'data-custom' => '<h1>这是一个全屏对话框示例</h1>',
        'data-size' => 'fullscreen',  // 全屏对话框
        //'data-size' => 'lg',  // 大对话框
        //'data-size' => 'md',  // 标准对话框(默认)
        //'data-size' => 'sm'  // 小对话框
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo ModalTrigger::widget([
    'label' => '全屏对话框',
    'options' => ['class' => 'btn-primary'],
    'clientOptions' => [
        'custom' => '<h1>这是一个全屏对话框示例</h1>',
        'size' => 'fullscreen',  // 全屏对话框
        //'size' => 'lg',  // 大对话框
        //'size' => 'md',  // 标准对话框(默认)
        //'size' => 'sm'  // 小对话框
    ]
]);
```
渲染结果:
```html
<!-- 使用 data-size 属性 -->
<button type="button" id="w0" class="btn btn-primary" data-custom="<h1>这是一个全屏对话框示例</h1>" data-size="fullscreen" data-toggle="modal">全屏对话框</button>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w1" class="btn btn-primary" data-toggle="modal">全屏对话框</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w1').modalTrigger({"custom":"<h1>这是一个全屏对话框示例</h1>","size":"fullscreen"});
});</script>
```


### 自定义头部

#### 不显示头部

不显示头部需要指定参数`showHeader`为`false`.

```php
// 使用 data-show-header 属性
echo ModalTrigger::widget([
    'label' => '不显示头部',
    'options' => [
        'class' => 'btn-primary',
        'data-custom' => '<h1>这个对话框不显示头部</h1>',
        'data-show-header' => 'false'
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo ModalTrigger::widget([
    'label' => '不显示头部',
    'options' => ['class' => 'btn-primary'],
    'clientOptions' => [
        'custom' => '<h1>这个对话框不显示头部</h1>',
        'showHeader' => 'false'
    ]
]);
```
渲染结果:
```html
<!-- 使用 data-show-header 属性 -->
<button type="button" id="w0" class="btn btn-primary" data-custom="<h1>这个对话框不显示头部</h1>" data-show-header="false" data-toggle="modal">不显示头部</button>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w1" class="btn btn-primary" data-toggle="modal">不显示头部</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w1').modalTrigger({"custom":"<h1>这个对话框不显示头部</h1>","showHeader":"false"});
});</script>
```

#### 自定义对话框标题

如果不指定对话框的标题, 会自动使用触发按钮的`title`属性或文本作为对话框的标题.

```php
// 使用 data-title 属性
echo ModalTrigger::widget([
    'label' => '自定义标题',
    'options' => [
        'class' => 'btn-primary',
        'data-custom' => '<h1>此对话框的标题是新的</h1>',
        'data-title' => '新的标题很重要'
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo ModalTrigger::widget([
    'label' => '自定义标题',
    'options' => ['class' => 'btn-primary'],
    'clientOptions' => [
        'custom' => '<h1>此对话框的标题是新的</h1>',
        'title' => '新的标题很重要'
    ]
]);
```
渲染结果:
```html
<!-- 使用 data-title 属性 -->
<button type="button" id="w0" class="btn btn-primary" data-custom="<h1>此对话框的标题是新的</h1>" data-title="新的标题很重要" data-toggle="modal">自定义标题</button>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w1" class="btn btn-primary" data-toggle="modal">自定义标题</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w1').modalTrigger({"custom":"<h1>此对话框的标题是新的</h1>","title":"新的标题很重要"});
});</script>
```

#### 使用图标

通过指定`icon`属性来在标题前面增加一个图标.

图标的定义请参考[控件 - 图标](control-icon.md)章节.

```php
// 使用 data-icon 属性
echo ModalTrigger::widget([
    'label' => '看看图标是什么',
    'options' => [
        'class' => 'btn-primary',
        'data-custom' => '<h1>此对话框标题包含一个图标</h1>',
        'data-icon' => 'heart'
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo ModalTrigger::widget([
    'label' => '看看图标是什么',
    'options' => ['class' => 'btn-primary'],
    'clientOptions' => [
        'custom' => '<h1>此对话框标题包含一个图标</h1>',
        'icon' => 'heart'
    ]
]);
```
渲染结果:
```html
<!-- 使用 data-icon 属性 -->
<button type="button" id="w0" class="btn btn-primary" data-custom="<h1>此对话框标题包含一个图标</h1>" data-icon="heart" data-toggle="modal">看看图标是什么</button>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w1" class="btn btn-primary" data-toggle="modal">看看图标是什么</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w1').modalTrigger({"custom":"<h1>此对话框标题包含一个图标</h1>","icon":"heart"});
});</script>
```

### 可拖动的对话框

开启此选项可以允许用户在对话框显示之后通过拖拽头部移动对话框. 完整例子参见 [JS插件 - 对话框](javascript-modal.md#可移动的对话框).

```php
// 使用 data-moveable 属性
echo ModalTrigger::widget([
    'label' => '<i class="icon icon-move"></i> 打开我 拖动我',
    'encodeLabel' => false,
    'options' => [
        'class' => 'btn-primary',
        'data-custom' => '<p>拖动我的头部来移动此对话框。</p><h1>:)</h1>',
        'data-moveable' => 'true',
        'data-remember-pos' => 'true'  // 记住对话框的移动位置
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo ModalTrigger::widget([
    'label' => '<i class="icon icon-move"></i> 打开我 拖动我',
    'encodeLabel' => false,
    'options' => ['class' => 'btn-primary'],
    'clientOptions' => [
        'custom' => '<p>拖动我的头部来移动此对话框。</p><h1>:)</h1>',
        'moveable' => 'true',
        'rememberPos' => 'true'  // 记住对话框的移动位置
    ]
]);
```
渲染结果:
```html
<!-- 使用 data-moveable 属性 -->
<button type="button" id="w0" class="btn btn-primary" data-custom="<p>拖动我的头部来移动此对话框。</p><h1>:)</h1>" data-moveable="true" data-remember-pos="true" data-toggle="modal"><i class="icon icon-move"></i> 打开我 拖动我</button>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w1" class="btn btn-primary" data-toggle="modal"><i class="icon icon-move"></i> 打开我 拖动我</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w1').modalTrigger({"custom":"<p>拖动我的头部来移动此对话框。</p><h1>:)</h1>","moveable":"true","rememberPos":"true"});
});</script>
```


### 如何使用

#### 使用data属性来调用

在触发按钮上设置data属性即可使用. 此方法与常规对话框触发按钮属性书写方式完全一致, 只不过需要增加几个特殊属性, 包括`data-remote`,`data-iframe`和`data-custom`.

使用data属性来调用请参考上面的实例章节.

#### 使用Javascript手动调用

Javascript方法也十分灵活.

#### jQuery对象方法

使得一个jquery对象能够监听事件(一般为点击)并启动对话框.

```js
$('#triggerButton').modalTrigger(options);
```

也可以使用`modalTrigger`的别名方法`modal`, 这样与传统对话框的初始化方法完全一致.

#### 使用预设的modalTrigger实例

在`$.zui`对象上已默认绑定了一个对话框触发器对象, 可以直接使用`方法`并传递不同的参数来随时启动对话框.

```js
$.zui.modalTrigger.show(options);
```

#### 创建新的触发器对象

创建一个新的对话框触发器来保存配置并启动对话框.

```js
var myModalTrigger = new $.zui.ModalTrigger(options);
myModalTrigger.show();
```


### 参数

在初始化对话框或者显示时都能够使用参数来个性化你的对话框.

<table>
  <thead>
    <tr>
      <th>参数</th>
      <th>名称</th>
      <th>可选值</th>
      <th>说明</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>name</code></td>
      <td>对话框元素名称</td>
      <td>可选, 默认为<code>'triggerModal'</code></td>
      <td>该名称会作为内部表示此触发器实例使用, 并且会作为最终生成的<code>.modal</code>元素的 ID 属性.</td>
    </tr>
    <tr>
      <td><code>className</code></td>
      <td>对话框元素类名</td>
      <td>可选, 默认为<code>''</code></td>
      <td>添加到最终生成的<code>.modal</code>元素的 CLASS 属性上.</td>
    </tr>
    <tr>
      <td><code>type</code></td>
      <td>对话框类型</td>
      <td>
        <ul>
          <li><code>'custom'</code>: (默认);</li>
          <li><code>'iframe'</code>: Ajax 模式;</li>
          <li><code>'ajax'</code>: iframe 内嵌框架模式;</li>
        </ul>
      </td>
      <td>该参数通常和参数<code>url</code>一起使用, 当指定了<code>custom</code>,<code>remote</code>和<code>iframe</code>参数时该参数可以忽略.</td>
    </tr>
    <tr>
      <td><code>url</code></td>
      <td>远程内容地址</td>
      <td>远程地址字符串</td>
      <td>该参数通常和参数<code>type</code>一起使用, 当指定了<code>custom</code>,<code>remote</code>和<code>iframe</code>参数时该参数可以忽略.</td>
    </tr>
    <tr>
      <td><code>remote</code></td>
      <td>Ajax内容地址</td>
      <td>远程地址字符串</td>
      <td>如果使用该参数, 则参数<code>type</code>和<code>url</code>可以忽略.</td>
    </tr>
    <tr>
      <td><code>iframe</code></td>
      <td>iframe页面地址</td>
      <td>远程地址字符串</td>
      <td>如果使用该参数, 则参数<code>type</code>和<code>url</code>可以忽略.</td>
    </tr>
    <tr>
      <td><code>size</code></td>
      <td>对话框大小</td>
      <td>
        <ul>
          <li><code>''</code>或<code>'md'</code>: 默认大小(默认);</li>
          <li><code>'lg'</code>: 大对话框;</li>
          <li><code>'sm'</code>: 小对话框;</li>
          <li><code>'fullscreen'</code>: 全屏显示;</li>
        </ul>
      </td>
      <td></td>
    </tr>
    <tr>
      <td><code>width</code></td>
      <td>对话框宽度</td>
      <td>
        <ul>
          <li><code>null</code>: 默认宽度(默认);</li>
          <li>其他表示宽度的CSS值字符串;</li>
        </ul>
      </td>
      <td>如果使用<code>size</code>参数, 则可以忽略该参数.</td>
    </tr>
    <tr>
      <td><code>height</code></td>
      <td>对话框高度</td>
      <td>
        <ul>
          <li><code>'auto'</code>: 自动根据内容调整(默认);</li>
          <li>其他表示高度的CSS值字符串;</li>
        </ul>
      </td>
      <td>如果指定了高度不是<code>'auto'</code>则可能出现内容与高度不匹配的情况.</td>
    </tr>
    <tr>
      <td><code>showHeader</code></td>
      <td>是否显示标题</td>
      <td>
        <ul>
          <li><code>true</code>: 显示(默认);</li>
          <li><code>false</code>: 不显示;</li>
        </ul>
      </td>
      <td></td>
    </tr>
    <tr>
      <td><code>title</code></td>
      <td>对话框标题文本</td>
      <td>字符串</td>
      <td>当参数<code>showHeader</code>为<code>false</code>则此参数无效.</td>
    </tr>
    <tr>
      <td><code>icon</code></td>
      <td>对话框标题图标</td>
      <td>图标名称字符串</td>
      <td>当参数<code>showHeader</code>为<code>false</code>则此参数无效.</td>
    </tr>
    <tr>
      <td><code>fade</code></td>
      <td>是否使用淡入淡出动画</td>
      <td>
        <ul>
          <li><code>true</code>: 使用动画(默认);</li>
          <li><code>false</code>: 不使用动画;</li>
        </ul>
      </td>
      <td></td>
    </tr>
    <tr>
      <td>`<code>position</code></td>
      <td>对话框位置</td>
      <td>
        <ul>
          <li><code>'fit'</code>: 最佳位置(默认);</li>
          <li><code>'center'</code>: 显示在窗口中间;</li>
          <li><code>number</code>: 按像素计算与顶部的距离;</li>
          <li><code>''</code>或<code>0</code>: 显示在顶部;</li>
          <li>其他表示距离的CSS字符串,具体顶部的偏移;</li>
        </ul>
      </td>
      <td>最佳位置在窗口中间稍偏上的位置.</td>
    </tr>
    <tr>
      <td><code>backdrop</code></td>
      <td>背景遮罩</td>
      <td>
        <ul>
          <li><code>true</code>: 启用(默认);</li>
          <li><code>false</code>: 禁用;</li>
          <li><code>'static'</code>: 启用背景遮罩, 但点击背景遮罩时不会触发关闭对话框的过程;</li>
        </ul>
      </td>
      <td></td>
    </tr>
    <tr>
      <td><code>keyboard</code></td>
      <td>按键</td>
      <td>
        <ul>
          <li><code>true</code>: 启用(默认);</li>
          <li><code>false</code>: 禁用;</li>
        </ul>
      </td>
      <td>当为<code>ture</code>时, 按下<code>esc</code>键会关闭对话框.</td>
    </tr>
    <tr>
      <td><code>moveable</code></td>
      <td>可移动的</td>
      <td>
        <ul>
          <li><code>false</code>: 不启用(默认);</li>
          <li><code>true</code>: 启用;</li>
          <li><code>'inside'</code>: 启用并限制对话框只能移动到窗口内部;</li>
        </ul>
      </td>
      <td>是否启用对话框拖拽移动功能.</td>
    </tr>
    <tr>
      <td><code>rememberPos</code></td>
      <td>记住移动的位置</td>
      <td>
        <ul>
          <li><code>false</code>: 不记住位置(默认);</li>
          <li><code>true</code>: 记住位置;</li>
          <li>页面内值唯一的字符串, 使用本地存储记住位置;</li>
        </ul>
      </td>
      <td>启用该选项需要同时启用<code>moveable</code>选项.<br />当该值为一个在页面范围内值唯一的字符串时, 通过浏览器本地存储来存储数据, 关闭页面或浏览器之后也不会忘记.</td>
    </tr>
    <tr>
      <td><code>waittime</code></td>
      <td>加载远程内容时的最大等待时间</td>
      <td>整数, 代表等待的毫秒数. 默认为<code>0</code>, 表示一直等待直到远程内容加载完毕才显示对话框.</td>
      <td>在指定的时间之后会直接显示对话框, 不管远程内容是否加载完毕. 在等待时会显示正在加载的动画.</td>
    </tr>
    <tr>
      <td><code>loadingIcon</code></td>
      <td>加载时显示的动画所使用的图标</td>
      <td>
        <ul>
          <li><code>'icon-spinner-indicator'</code>: 默认值;</li>
          <li><code>'icon-*'</code>: 以<code>icon-*</code>形式定义的图标名称;</li>
          <li>自定义加载动画所使用的html;</li>
        </ul>
      </td>
      <td></td>
    </tr>
  </tbody>
</table>


### 方法

#### 获取触发器对象实例

要使用触发器方法, 需要首先获取触发器对象的实例.

##### 通过触发按钮的data属性

```js
var modalTrigger = $('#triggerButton').data('zui.modaltrigger');
```

##### 使用预设的$.zui对象绑定的触发器

```js
var myTrigger = $.zui.modalTrigger;
```

##### 创建新的触发器实例

```js
var newTrigger = new $.zui.ModalTrigger(options);
```

#### 显示对话框

在显示对话框时, 可以重新传入新的参数, 而不影响触发器对象原来的参数.

```js
myModalTrigger.show(options);
```

#### 关闭对话框

```js
myModalTrigger.close();
```

#### 切换显示和关闭状态

如果对话框没有显示, 则立即显示, 如果已经显示则关闭.

在切换显示和关闭状态时, 可以重新传入新的参数, 而不影响触发器对象原来的参数.

```js
myModalTrigger.toggle(options);
```

#### 重新调整位置

使用新的位置参数来重新设置对话框的显示位置.

```js
myModalTrigger.ajustPosition(options);
```


### 事件

因为对话框的DOM内容是动态生成的, 不方便使用jQuery方法来绑定事件, 不过可以将监听事件的回调函数传入参数中.

<table>
  <thead>
    <tr>
      <th>事件</th>
      <th>jquery事件名称</th>
      <th>说明</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>onShow</code></td>
      <td><code>show.zui.modal</code></td>
      <td>当对话框的<code>show</code>方法被调用时立即发生.</td>
    </tr>
    <tr>
      <td><code>shown</code></td>
      <td><code>shown.zui.modal</code></td>
      <td>当对话框完全显示后发生(执行完显示动画之后).</td>
    </tr>
    <tr>
      <td><code>onHide</code></td>
      <td><code>hide.zui.modal</code></td>
      <td>当对话框<code>hide</code>方法被调用是立即发生.</td>
    </tr>
    <tr>
      <td><code>hidden</code></td>
      <td><code>hidden.zui.modal</code></td>
      <td>当对话框完全隐藏后发生(执行完隐藏动画之后).</td>
    </tr>
    <tr>
      <td><code>loaded</code></td>
      <td><code>loaded.zui.modal</code></td>
      <td>当远程内容加载完成后发生.</td>
    </tr>
    <tr>
      <td><code>broken</code></td>
      <td><code>broken.zui.modal</code></td>
      <td>当加载远程内容失败之后调用, 在次回调方法中返回字符串会更新对话框现实的内容(例如在对话框中显示一个加载失败之后的帮助信息).</td>
    </tr>
  </tbody>
</table>

```js
myModalTrigger.show({shown: function() {
    alert('对话框已显示。');
}});
```

如果对话框的`name`参数是已知的, 则可以获取对话框的jquery对象实例通过jQuery对象的on方法来绑定事件.

```js
$('#triggerModal').on('shown.zui.modal', function() {...});
```

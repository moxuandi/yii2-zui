# [JS插件 - 弹出面板](http://zui.sexy/#javascript/popover)

### 静态类型

#### 普通静态示例:

```php
// 从上方弹出(箭头在下方)
echo PopoverPanel::widget([
    'options' => ['style' => 'position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;'],
    'arrowPosition' => 'top',
    'header' => '从上方弹出(箭头在下方)',
    'content' => '<h4>江雪 <small>唐·柳宗元</small></h4><p>千山鸟飞绝，万径人踪灭。</p><p>孤舟蓑笠翁，独钓寒江雪。</p>',
]);

// 从下方弹出(箭头在上方)
echo PopoverPanel::widget([
    'options' => ['style' => 'position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;'],
    'arrowPosition' => 'bottom',
    'header' => '从下方弹出(箭头在上方)',
    'content' => '<h4>江雪 <small>唐·柳宗元</small></h4><p>千山鸟飞绝，万径人踪灭。</p><p>孤舟蓑笠翁，独钓寒江雪。</p>',
]);

// 从左侧弹出(箭头在右方)
echo PopoverPanel::widget([
    'options' => ['style' => 'position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;'],
    'arrowPosition' => 'left',
    'header' => '从左侧弹出(箭头在右方)',
    'content' => '<h4>江雪 <small>唐·柳宗元</small></h4><p>千山鸟飞绝，万径人踪灭。</p><p>孤舟蓑笠翁，独钓寒江雪。</p>',
]);

// 从右侧弹出(箭头在左方)
echo PopoverPanel::widget([
    'options' => ['style' => 'position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;'],
    'arrowPosition' => 'right',
    'header' => '从右侧弹出(箭头在左方)',
    'content' => '<h4>江雪 <small>唐·柳宗元</small></h4><p>千山鸟飞绝，万径人踪灭。</p><p>孤舟蓑笠翁，独钓寒江雪。</p>',
]);

// 从右侧弹出(添加`no-arrow`类样式)
echo PopoverPanel::widget([
    'options' => ['class' => 'no-arrow', 'style' => 'position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;'],
    'arrowPosition' => 'right',
    'header' => '从右侧弹出(添加`no-arrow`类样式)',
    'content' => '<h4>江雪 <small>唐·柳宗元</small></h4><p>千山鸟飞绝，万径人踪灭。</p><p>孤舟蓑笠翁，独钓寒江雪。</p>',
]);

// 不带箭头
echo PopoverPanel::widget([
    'options' => ['style' => 'position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;'],
    'header' => '不带箭头',
    'content' => '<h4>江雪 <small>唐·柳宗元</small></h4><p>千山鸟飞绝，万径人踪灭。</p><p>孤舟蓑笠翁，独钓寒江雪。</p>',
]);
```
渲染结果:
```html
<!-- 从上方弹出(箭头在下方) -->
<div class="popover top" style="position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;">
    <div class="arrow"></div>
    <h3 class="popover-title">从上方弹出(箭头在下方)</h3>
    <div class="popover-content">
        <h4>江雪 <small>唐·柳宗元</small></h4>
        <p>千山鸟飞绝，万径人踪灭。</p>
        <p>孤舟蓑笠翁，独钓寒江雪。</p>
    </div>
</div>

<!-- 从下方弹出(箭头在上方) -->
<div class="popover bottom" style="position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;">
    <div class="arrow"></div>
    <h3 class="popover-title">从下方弹出(箭头在上方)</h3>
    <div class="popover-content">
        <h4>江雪 <small>唐·柳宗元</small></h4>
        <p>千山鸟飞绝，万径人踪灭。</p>
        <p>孤舟蓑笠翁，独钓寒江雪。</p>
    </div>
</div>

<!-- 从左侧弹出(箭头在右方) -->
<div class="popover left" style="position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;">
    <div class="arrow"></div>
    <h3 class="popover-title">从左侧弹出(箭头在右方)</h3>
    <div class="popover-content">
        <h4>江雪 <small>唐·柳宗元</small></h4>
        <p>千山鸟飞绝，万径人踪灭。</p>
        <p>孤舟蓑笠翁，独钓寒江雪。</p>
    </div>
</div>

<!-- 从右侧弹出(箭头在左方) -->
<div class="popover right" style="position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;">
    <div class="arrow"></div>
    <h3 class="popover-title">从右侧弹出(箭头在左方)</h3>
    <div class="popover-content">
        <h4>江雪 <small>唐·柳宗元</small></h4>
        <p>千山鸟飞绝，万径人踪灭。</p>
        <p>孤舟蓑笠翁，独钓寒江雪。</p>
    </div>
</div>

<!-- 从右侧弹出(添加`no-arrow`类样式) -->
<div class="popover right no-arrow" style="position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;">
    <div class="arrow"></div>
    <h3 class="popover-title">从右侧弹出(添加`no-arrow`类样式)</h3>
    <div class="popover-content">
        <h4>江雪 <small>唐·柳宗元</small></h4>
        <p>千山鸟飞绝，万径人踪灭。</p>
        <p>孤舟蓑笠翁，独钓寒江雪。</p>
    </div>
</div>

<!-- 不带箭头 -->
<div class="popover" style="position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;">
    <h3 class="popover-title">不带箭头</h3>
    <div class="popover-content">
        <h4>江雪 <small>唐·柳宗元</small></h4>
        <p>千山鸟飞绝，万径人踪灭。</p>
        <p>孤舟蓑笠翁，独钓寒江雪。</p>
    </div>
</div>
```

#### 感情色彩

```php
// 感情色彩: primary
echo PopoverPanel::widget([
    'options' => ['class' => 'popover-primary', 'style' => 'position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;'],
    'header' => '感情色彩: primary',
    'content' => '<h4>江雪 <small>唐·柳宗元</small></h4><p>千山鸟飞绝，万径人踪灭。</p><p>孤舟蓑笠翁，独钓寒江雪。</p>',
]);

// 感情色彩: success
echo PopoverPanel::widget([
    'options' => ['class' => 'popover-success', 'style' => 'position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;'],
    'header' => '感情色彩: success',
    'content' => '<h4>江雪 <small>唐·柳宗元</small></h4><p>千山鸟飞绝，万径人踪灭。</p><p>孤舟蓑笠翁，独钓寒江雪。</p>',
]);

// 感情色彩: info
echo PopoverPanel::widget([
    'options' => ['class' => 'popover-info', 'style' => 'position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;'],
    'header' => '感情色彩: info',
    'content' => '<h4>江雪 <small>唐·柳宗元</small></h4><p>千山鸟飞绝，万径人踪灭。</p><p>孤舟蓑笠翁，独钓寒江雪。</p>',
]);

// 感情色彩: warning
echo PopoverPanel::widget([
    'options' => ['class' => 'popover-warning', 'style' => 'position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;'],
    'header' => '感情色彩: warning',
    'content' => '<h4>江雪 <small>唐·柳宗元</small></h4><p>千山鸟飞绝，万径人踪灭。</p><p>孤舟蓑笠翁，独钓寒江雪。</p>',
]);

// 感情色彩: danger
echo PopoverPanel::widget([
    'options' => ['class' => 'popover-danger', 'style' => 'position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;'],
    'header' => '感情色彩: danger',
    'content' => '<h4>江雪 <small>唐·柳宗元</small></h4><p>千山鸟飞绝，万径人踪灭。</p><p>孤舟蓑笠翁，独钓寒江雪。</p>',
]);
```
渲染结果:
```html
<!-- 感情色彩: primary -->
<div class="popover popover-primary" style="position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;">
    <h3 class="popover-title">感情色彩: primary</h3>
    <div class="popover-content">
        <h4>江雪 <small>唐·柳宗元</small></h4>
        <p>千山鸟飞绝，万径人踪灭。</p>
        <p>孤舟蓑笠翁，独钓寒江雪。</p>
    </div>
</div>

<!-- 感情色彩: success -->
<div class="popover popover-success" style="position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;">
    <h3 class="popover-title">感情色彩: success</h3>
    <div class="popover-content">
        <h4>江雪 <small>唐·柳宗元</small></h4>
        <p>千山鸟飞绝，万径人踪灭。</p>
        <p>孤舟蓑笠翁，独钓寒江雪。</p>
    </div>
</div>

<!-- 感情色彩: info -->
<div class="popover popover-info" style="position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;">
    <h3 class="popover-title">感情色彩: info</h3>
    <div class="popover-content">
        <h4>江雪 <small>唐·柳宗元</small></h4>
        <p>千山鸟飞绝，万径人踪灭。</p>
        <p>孤舟蓑笠翁，独钓寒江雪。</p>
    </div>
</div>

<!-- 感情色彩: warning -->
<div class="popover popover-warning" style="position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;">
    <h3 class="popover-title">感情色彩: warning</h3>
    <div class="popover-content">
        <h4>江雪 <small>唐·柳宗元</small></h4>
        <p>千山鸟飞绝，万径人踪灭。</p>
        <p>孤舟蓑笠翁，独钓寒江雪。</p>
    </div>
</div>

<!-- 感情色彩: danger -->
<div class="popover popover-danger" style="position:relative;display:block;float:left;width:260px;margin:20px;z-index:0;">
    <h3 class="popover-title">感情色彩: danger</h3>
    <div class="popover-content">
        <h4>江雪 <small>唐·柳宗元</small></h4>
        <p>千山鸟飞绝，万径人踪灭。</p>
        <p>孤舟蓑笠翁，独钓寒江雪。</p>
    </div>
</div>
```


### 动态演示

#### 基本示例

```php
// 使用 data-* 属性
echo Popover::widget([
    'label' => '显示/隐藏弹出面板',
    'options' => [
        'class' => 'btn-danger',
        'title' => '江雪',
        'data-content' => '千山鸟飞绝，万径人踪灭。'
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo Popover::widget([
    'label' => '显示/隐藏弹出面板',
    'clientOptions' => [
        'class' => 'btn-danger',
        'title' => '江雪',
        'content' => '千山鸟飞绝，万径人踪灭。'
    ]
]);
```
渲染结果:
```html
<!-- 使用 data-* 属性 -->
<button type="button" id="w0" class="btn btn-danger" title="" data-content="千山鸟飞绝，万径人踪灭。" data-toggle="popover" data-original-title="江雪">显示/隐藏弹出面板</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w0').popover();
});</script>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w1" class="btn btn-danger" data-toggle="popover" data-original-title="" title="">显示/隐藏弹出面板</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w1').popover({"title":"江雪","content":"千山鸟飞绝，万径人踪灭。"});
});</script>
```

#### 弹出方向

使用`placement`选项来指定相对于元素显示的位置, `placement`默认为`right`.

```php
// 使用 data-placement 属性, 值为: right(默认)
echo Popover::widget([
    'label' => '从右侧弹出',
    'options' => [
        'title' => '江雪',
        'data-content' => '千山鸟飞绝，万径人踪灭。',
        //'data-placement' => 'right'
    ]
]);

// 使用 data-placement 属性, 值为: left
echo Popover::widget([
    'label' => '从左侧弹出',
    'options' => [
        'title' => '江雪',
        'data-content' => '千山鸟飞绝，万径人踪灭。',
        'data-placement' => 'left'
    ]
]);

// 使用 data-placement 属性, 值为: top
echo Popover::widget([
    'label' => '从上方弹出',
    'options' => [
        'title' => '江雪',
        'data-content' => '千山鸟飞绝，万径人踪灭。',
        'data-placement' => 'top'
    ]
]);

// 使用 data-placement 属性, 值为: bottom
echo Popover::widget([
    'label' => '从下方弹出',
    'options' => [
        'title' => '江雪',
        'data-content' => '千山鸟飞绝，万径人踪灭。',
        'data-placement' => 'bottom'
    ]
]);

// 使用 data-placement 属性, 值为: auto
echo Popover::widget([
    'label' => '自动判断弹出方向',
    'options' => [
        'title' => '江雪',
        'data-content' => '千山鸟飞绝，万径人踪灭。',
        'data-placement' => 'auto'
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo Popover::widget([
    'label' => '自动判断弹出方向',
    'clientOptions' => [
        'title' => '江雪',
        'content' => '千山鸟飞绝，万径人踪灭。',
        'placement' => 'auto'
    ]
]);
```
渲染结果:
```html
<!-- 使用 data-placement 属性, 值为: right(默认) -->
<button type="button" id="w0" class="btn" data-content="千山鸟飞绝，万径人踪灭。" data-toggle="popover" data-original-title="江雪">从右侧弹出</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w0').popover();
});</script>

<!-- 使用 data-placement 属性, 值为: left -->
<button type="button" id="w1" class="btn" data-content="千山鸟飞绝，万径人踪灭。" data-placement="left" data-toggle="popover" data-original-title="江雪">从左侧弹出</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w1').popover();
});</script>

<!-- 使用 data-placement 属性, 值为: top -->
<button type="button" id="w2" class="btn" data-content="千山鸟飞绝，万径人踪灭。" data-placement="top" data-toggle="popover" data-original-title="江雪">从上方弹出</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w2').popover();
});</script>

<!-- 使用 data-placement 属性, 值为: bottom -->
<button type="button" id="w3" class="btn" data-content="千山鸟飞绝，万径人踪灭。" data-placement="bottom" data-toggle="popover" data-original-title="江雪">从下方弹出</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w3').popover();
});</script>

<!-- 使用 data-placement 属性, 值为: auto -->
<button type="button" id="w4" class="btn" data-content="千山鸟飞绝，万径人踪灭。" data-placement="auto" data-toggle="popover" data-original-title="江雪">自动判断弹出方向</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w4').popover();
});</script>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w5" class="btn" data-toggle="popover" data-original-title="" title="">自动判断弹出方向</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w5').popover({"title":"江雪","content":"千山鸟飞绝，万径人踪灭。","placement":"auto"});
});</script>
```

## 外观

使用`tipClass`指定外观类名来更改颜色主题.

```php
// 使用 data-tip-class 属性, 值为: popover-primary
echo Popover::widget([
    'label' => '.popover-primary',
    'options' => [
        'class' => 'btn-primary',
        'title' => '江雪',
        'data-content' => '千山鸟飞绝，万径人踪灭。',
        'data-tip-class' => 'popover-primary'
    ]
]);

// 使用 data-tip-class 属性, 值为: popover-success
echo Popover::widget([
    'label' => '.popover-success',
    'options' => [
        'class' => 'btn-success',
        'title' => '江雪',
        'data-content' => '千山鸟飞绝，万径人踪灭。',
        'data-tip-class' => 'popover-success'
    ]
]);

// 使用 data-tip-class 属性, 值为: popover-info
echo Popover::widget([
    'label' => '.popover-info',
    'options' => [
        'class' => 'btn-info',
        'title' => '江雪',
        'data-content' => '千山鸟飞绝，万径人踪灭。',
        'data-tip-class' => 'popover-info'
    ]
]);

// 使用 data-tip-class 属性, 值为: popover-warning
echo Popover::widget([
    'label' => '.popover-warning',
    'options' => [
        'class' => 'btn-warning',
        'title' => '江雪',
        'data-content' => '千山鸟飞绝，万径人踪灭。',
        'data-tip-class' => 'popover-warning'
    ]
]);

// 使用 data-tip-class 属性, 值为: popover-danger
echo Popover::widget([
    'label' => '.popover-danger',
    'options' => [
        'class' => 'btn-danger',
        'title' => '江雪',
        'data-content' => '千山鸟飞绝，万径人踪灭。',
        'data-tip-class' => 'popover-danger'
    ]
]);

// 使用 Javascript 方法绑定在按钮上触发
echo Popover::widget([
    'label' => '.popover-danger',
    'options' => ['class' => 'btn-danger'],
    'clientOptions' => [
        'title' => '江雪',
        'content' => '千山鸟飞绝，万径人踪灭。',
        'tipClass' => 'popover-danger'
    ]
]);
```
渲染结果:
```html
<!-- 使用 data-tip-class 属性, 值为: popover-primary -->
<button type="button" id="w0" class="btn btn-primary" data-content="千山鸟飞绝，万径人踪灭。" data-tip-class="popover-primary" data-toggle="popover" data-original-title="江雪">.popover-primary</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w0').popover();
});</script>

<!-- 使用 data-tip-class 属性, 值为: popover-success -->
<button type="button" id="w1" class="btn btn-success" data-content="千山鸟飞绝，万径人踪灭。" data-tip-class="popover-success" data-toggle="popover" data-original-title="江雪">.popover-success</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w1').popover();
});</script>

<!-- 使用 data-tip-class 属性, 值为: popover-info -->
<button type="button" id="w2" class="btn btn-info" data-content="千山鸟飞绝，万径人踪灭。" data-tip-class="popover-info" data-toggle="popover" data-original-title="江雪">.popover-info</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w2').popover();
});</script>

<!-- 使用 data-tip-class 属性, 值为: popover-warning -->
<button type="button" id="w3" class="btn btn-warning" data-content="千山鸟飞绝，万径人踪灭。" data-tip-class="popover-warning" data-toggle="popover" data-original-title="江雪">.popover-warning</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w3').popover();
});</script>

<!-- 使用 data-tip-class 属性, 值为: popover-danger -->
<button type="button" id="w4" class="btn btn-danger" data-content="千山鸟飞绝，万径人踪灭。" data-tip-class="popover-danger" data-toggle="popover" data-original-title="江雪">.popover-danger</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w4').popover();
});</script>

<!-- 使用 Javascript 方法绑定在按钮上触发 -->
<button type="button" id="w5" class="btn btn-danger" data-toggle="popover" data-original-title="" title="">.popover-danger</button>
<script type="text/javascript">jQuery(document).ready(function () {
$('#w5').popover({"title":"江雪","content":"千山鸟飞绝，万径人踪灭。","tipClass":"popover-danger"});
});</script>
```


### 用法

#### 初始化

出于性能方面的考虑, 工具提示和弹框组件的`data`属性`api`是选择性加入的, 也就是说 **你必须自己初始化他们**.

 - `$().popover()`
 - `$().popover(options)`

参数`options`用于设置初始化选项, 是可以选的. 初始化选项也可以通过元素上的`[data-*]`属性来设置.

#### 选项

可用的初始化选项如下:

<table>
  <thead>
    <tr>
      <th style="width: 100px;">名称</th>
      <th style="width: 100px;">类型</th>
      <th style="width: 50px;">默认值</th>
      <th>描述</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>animation</code></td>
      <td><code>boolean</code></td>
      <td><code>true</code></td>
      <td>是否应用淡入淡出动画。</td>
    </tr>
    <tr>
      <td><code>container</code></td>
      <td><code>string|false</code></td>
      <td><code>false</code></td>
      <td>可以设置为一个 CSS 选择器字符串用于指定动态创建的弹出面板元素被添加到的父级容器元素, 例如<code>container: 'body'</code>. 默认为<code>false</code>, 此时动态创建的弹出面板元素被添加到触发元素所在的父级元素.</td>
    </tr>
    <tr>
      <td><code>content</code></td>
      <td><code>string|function</code></td>
      <td><code>''</code></td>
      <td>用设定弹出面板显示的内容, 如果指定为函数, 则应该在函数内返回用于内容的字符串.</td>
    </tr>
    <tr>
      <td><code>delay</code></td>
      <td><code>number|object</code></td>
      <td><code>0</code></td>
      <td>如果指定为数字, 则在指定数值的毫秒数后再显示. 如果指定为对象, 则可以分别为显示或隐藏之前延迟的数值. 例如:<code>delay: { show: 500, hide: 100 }</code>.</td>
    </tr>
    <tr>
      <td><code>html</code></td>
      <td><code>boolean</code></td>
      <td><code>false</code></td>
      <td>是否允许弹出面板内容包含 HTML 格式源码. 如果设置为<code>false</code>, 则仅仅使用 jQuery 的<code>text()</code>方法来设置弹出面板内容.</td>
    </tr>
    <tr>
      <td><code>placement</code></td>
      <td><code>string|function</code></td>
      <td><code>'right'</code></td>
      <td>设置弹出面板显示的位置, 可选值有: <code>'top'</code>,<code>'bottom'</code>,<code>'left'</code>,<code>'right'</code>,<code>'auto'</code>. 如果设置为<code>'auto'</code>, 则会自动决定位置. 也可以指定为一个函数, 来动态返回应该显示的位置.</td>
    </tr>
    <tr>
      <td><code>selector</code></td>
      <td><code>string|false</code></td>
      <td><code>false</code></td>
      <td>如果指定了该选项, 则会在代理元素来触发显示弹出面板, 这样可以对于一些动态内容使用弹出面板.</td>
    </tr>
    <tr>
      <td><code>template</code></td>
      <td><code>string</code></td>
      <td><code>'&lt;div class=&quot;popover&quot;&gt;&lt;div class=&quot;arrow&quot;&gt;&lt;/div&gt;&lt;h3 class=&quot;popover-title&quot;&gt;&lt;/h3&gt;&lt;div class=&quot;popover-content&quot;&gt;&lt;/div&gt;&lt;/div&gt;'</code></td>
      <td>HTML 模板字符串用来创建弹出面板显示内容元素. 要求顶级元素必须有<code>.popover</code>类, 弹出面板的内容会设置为<code>.popover-content</code>的内容, 标题会设置为<code>.popover-title</code>的内容, <code>.arrow</code>将作为箭头元素.</td>
    </tr>
    <tr>
      <td><code>title</code></td>
      <td><code>string|function</code></td>
      <td><code>''</code></td>
      <td>用设定弹出面板显示的标题, 如果指定为函数, 则应该在函数内返回用于标题的字符串.</td>
    </tr>
    <tr>
      <td><code>trigger</code></td>
      <td><code>string</code></td>
      <td><code>'click'</code></td>
      <td>指定哪些事件会触发显示弹出面板, 多个事件用空格隔开, 可选值包括:<code>'click'</code>,<code>'hover'</code>,<code>'focus'</code>,<code>'manual'</code>. 如果设定为<code>'manual'</code>则需要用户通过 JavaScript 手动显示或隐藏弹出面板.</td>
    </tr>
    <tr>
      <td><code>tipClass</code></td>
      <td><code>string</code></td>
      <td><code>''</code></td>
      <td>为动态生成的<code>.popover</code>元素添加额外的 CSS 类.</td>
    </tr>
    <tr>
      <td><code>tipId</code></td>
      <td><code>string</code></td>
      <td><code>''</code></td>
      <td>为动态生成的<code>.popover</code>元素设置 ID 属性.</td>
    </tr>
  </tbody>
</table>


### 方法

#### 显示弹出框

```js
$('#myPopover').popover('show');
```

#### 隐藏弹出框

```js
$('#myPopover').popover('hide');
```

#### 展示或隐藏弹出框

```js
$('#myPopover').popover('toggle');
```

#### 隐藏并销毁弹出框

```js
$('#myPopover').popover('destroy');
```


### 事件

当弹出面板显示或隐藏时会在触发元素上触发如下事件:

<table>
  <thead>
    <tr>
      <th style="width: 150px;">事件类型</th>
      <th>描述</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>show.zui.popover</code></td>
      <td>当<code>show</code>方法被调用之后, 此事件将被立即触发.</td>
    </tr>
    <tr>
      <td><code>shown.zui.popover</code></td>
      <td>当弹出框展示到用户面前之后(同时CSS过渡效果执行完之后)此事件被触发.</td>
    </tr>
    <tr>
      <td><code>hide.zui.popover</code></td>
      <td>当<code>hide</code>方法被调用之后, 此事件被触发.</td>
    </tr>
    <tr>
      <td><code>hidden.zui.popover</code></td>
      <td>当弹出框被隐藏之后(同时 CSS 过渡效果执行完之后), 此事件被触发.</td>
    </tr>
  </tbody>
</table>


### 使用要点

*   弹出框依赖 [工具提示插件](#javascript/tooltips), 因此需要先加载工具提示插件.
*   弹出框在按钮组和输入框组中使用时, 需要额外的设置: 当提示框与`.btn-group`或`.input-group`联合使用时, 你需要指定`container:'body'`选项以避免不需要的副作用(例如, 当弹出框显示之后, 与其合作的页面元素可能变得更宽或是去圆角).
*   在禁止使用的页面元素上使用弹出框时需要额外增加一个元素将其包裹起来: 为了给`disabled`或`.disabled`元素添加弹出框时, 将需要增加弹出框的页面元素包裹在一个`<div>`中, 然后对这个`<div>`元素应用弹出框.

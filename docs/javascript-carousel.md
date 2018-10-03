# [JS插件 - 轮播](http://zui.sexy/#javascript/carousel)

通过data属性可以很容易的控制轮播的定位. `data-slide`可以接受控制播放位置的`prev`或`next`关键字. 另外, 还可以通过`data-slide-to`传递以`0`开始的幻灯片下标. `data-ride="carousel"`属性用来标记在页面加载之后即开始启动的轮播组件.

### 基本类型

```php
echo Carousel::widget([
    'items' => [
        [
            'content' => '<img alt="First slide" src="http://zui.sexy/docs/img/slide1.jpg">',
            'caption' => '<h3>我是第一张幻灯片</h3><p>:)</p>',
        ],
        [
            'content' => '<img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">',
            'caption' => '<h3>我是第二张幻灯片</h3><p>0.0</p>',
        ],
        [
            'content' => '<img alt="Third slide" src="http://zui.sexy/docs/img/slide3.jpg">',
            'caption' => '<h3>我是第三张幻灯片</h3><p>最后一张咯~</p>',
        ],
        '<img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">'
    ]
]);
```
渲染结果:
```html
<div id="w0" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li class="active" data-target="#w0" data-slide-to="0"></li>
        <li data-target="#w0" data-slide-to="1"></li>
        <li data-target="#w0" data-slide-to="2"></li>
        <li data-target="#w0" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img alt="First slide" src="http://zui.sexy/docs/img/slide1.jpg">
            <div class="carousel-caption"><h3>我是第一张幻灯片</h3><p>:)</p></div>
        </div>
        <div class="item">
            <img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">
            <div class="carousel-caption"><h3>我是第二张幻灯片</h3><p>0.0</p></div>
        </div>
        <div class="item">
            <img alt="Third slide" src="http://zui.sexy/docs/img/slide3.jpg">
            <div class="carousel-caption"><h3>我是第三张幻灯片</h3><p>最后一张咯~</p></div>
        </div>
        <div class="item"><img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg"></div>
    </div>
    <a class="carousel-control left" href="#w0" data-slide="prev"><span class="icon icon-prev"></span></a>
    <a class="carousel-control right" href="#w0" data-slide="next"><span class="icon icon-next"></span></a>
</div>
```


### 自定义切换按钮

```php
// 预制的icon类
echo Carousel::widget([
    'items' => [
        [
            'content' => '<img alt="First slide" src="http://zui.sexy/docs/img/slide1.jpg">',
            'caption' => '<h3>我是第一张幻灯片</h3><p>:)</p>',
        ],
        [
            'content' => '<img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">',
            'caption' => '<h3>我是第二张幻灯片</h3><p>0.0</p>',
        ],
        [
            'content' => '<img alt="Third slide" src="http://zui.sexy/docs/img/slide3.jpg">',
            'caption' => '<h3>我是第三张幻灯片</h3><p>最后一张咯~</p>',
        ],
        '<img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">'
    ],
    'controls' => [
        'prev' => '<span class="icon icon-chevron-left"></span>',
        'next' => '<span class="icon icon-chevron-right"></span>'
    ],
]);
```
渲染结果:
```html
<div id="w0" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li class="active" data-target="#w0" data-slide-to="0"></li>
        <li data-target="#w0" data-slide-to="1"></li>
        <li data-target="#w0" data-slide-to="2"></li>
        <li data-target="#w0" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img alt="First slide" src="http://zui.sexy/docs/img/slide1.jpg">
            <div class="carousel-caption"><h3>我是第一张幻灯片</h3><p>:)</p></div>
        </div>
        <div class="item">
            <img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">
            <div class="carousel-caption"><h3>我是第二张幻灯片</h3><p>0.0</p></div>
        </div>
        <div class="item">
            <img alt="Third slide" src="http://zui.sexy/docs/img/slide3.jpg">
            <div class="carousel-caption"><h3>我是第三张幻灯片</h3><p>最后一张咯~</p></div>
        </div>
        <div class="item"><img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg"></div>
    </div>
    <a class="carousel-control left" href="#w0" data-slide="prev"><span class="icon icon-chevron-left"></span></a>
    <a class="carousel-control right" href="#w0" data-slide="next"><span class="icon icon-chevron-right"></span></a>
</div>
```


### 参数

可以将选项通过data属性或 JavaScript 传递. 对于data属性, 需要将选项名称放到`data-`之后, 例如`data-interval=""`.

<table>
  <thead>
    <tr>
      <th style="width: 100px;">名称</th>
      <th style="width: 50px;">类型</th>
      <th style="width: 50px;">默认值</th>
      <th>描述</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><code>interval</code></td>
      <td><code>number</code></td>
      <td><code>5000</code></td>
      <td>幻灯片轮换的等待时间. 如果为<code>false</code>, 轮播将不会自动开始循环.</td>
    </tr>
    <tr>
      <td><code>pause</code></td>
      <td><code>string</code></td>
      <td><code>"hover"</code></td>
      <td>鼠标停留在幻灯片区域即暂停轮播, 鼠标离开即启动轮播.</td>
    </tr>
    <tr>
      <td><code>wrap</code></td>
      <td><code>boolean</code></td>
      <td><code>true</code></td>
      <td>轮播是否持续循环.</td>
    </tr>
  </tbody>
</table>

#### 手动调用 Javascript 示例

```php
echo Carousel::widget([
    'items' => [
        [
            'content' => '<img alt="First slide" src="http://zui.sexy/docs/img/slide1.jpg">',
            'caption' => '<h3>我是第一张幻灯片</h3><p>:)</p>',
        ],
        [
            'content' => '<img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">',
            'caption' => '<h3>我是第二张幻灯片</h3><p>0.0</p>',
        ],
        [
            'content' => '<img alt="Third slide" src="http://zui.sexy/docs/img/slide3.jpg">',
            'caption' => '<h3>我是第三张幻灯片</h3><p>最后一张咯~</p>',
        ],
        '<img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">'
    ],
    'clientOptions' => [
        'interval' => 1000,
        'wrap' => false
    ]
]);
```
渲染结果:
```html
<div id="w0" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li class="active" data-target="#w0" data-slide-to="0"></li>
        <li data-target="#w0" data-slide-to="1"></li>
        <li data-target="#w0" data-slide-to="2"></li>
        <li data-target="#w0" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img alt="First slide" src="http://zui.sexy/docs/img/slide1.jpg">
            <div class="carousel-caption"><h3>我是第一张幻灯片</h3><p>:)</p></div>
        </div>
        <div class="item">
            <img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">
            <div class="carousel-caption"><h3>我是第二张幻灯片</h3><p>0.0</p></div>
        </div>
        <div class="item">
            <img alt="Third slide" src="http://zui.sexy/docs/img/slide3.jpg">
            <div class="carousel-caption"><h3>我是第三张幻灯片</h3><p>最后一张咯~</p></div>
        </div>
        <div class="item">
            <img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">
        </div>
    </div>
    <a class="carousel-control left" href="#w0" data-slide="prev"><span class="icon icon-prev"></span></a>
    <a class="carousel-control right" href="#w0" data-slide="next"><span class="icon icon-next"></span></a>
</div>

<script type="text/javascript">jQuery(document).ready(function () {
$('#w0').carousel({"interval":1000,"wrap":false});
});</script>
```


### 方法

 -`.carousel(options)`: 初始化轮播组件, 接受一个可选的object类型的options参数, 并开始幻灯片循环.
 -`.carousel('cycle')`: 从左到右循环各帧.
 -`.carousel('pause')`: 停止轮播.
 -`.carousel(number)`: 将轮播定位到指定的帧上(帧下标以0开始, 类似数组).
 -`.carousel('pre')`: 返回上一帧
 -`.carousel('next')`: 转到下一帧


### 事件

 -`slide.zui.carousel`: 此事件在`slide`方法被调用之后立即出发.
 -`slid.zui.carousel`: 当所有幻灯片播放完之后被触发.

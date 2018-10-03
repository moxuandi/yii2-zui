# [视图 - 图片浏览](http://zui.sexy/#view/lightbox)

此插件允许用户进入灯箱式浏览页面上的图片.


### 简单例子

为按钮或链接增加`data-toggle="lightbox"`属性, 点击按钮或图片来浏览图片大图. 增加`data-caption="*"`属性来为图片增加额外的描述文本.

```php
// 链接
echo Lightbox::widget([
    'label' => '<i class="icon icon-picture"></i> 浏览图片',
    'encodeLabel' => false,
    'options' => [
        'data-image' => 'http://zui.sexy/docs/img/img2.jpg',
        'data-caption' => '小图看大图',
        'class' => 'btn btn-primary',
    ],
]);

// 按钮
echo Lightbox::widget([
    'label' => '<i class="icon icon-picture"></i> 浏览图片',
    'encodeLabel' => false,
    'options' => [
        'tag' => 'button',
        'data-image' => 'http://zui.sexy/docs/img/img2.jpg',
        'data-caption' => '小图看大图',
        'class' => 'btn btn-primary',
    ],
]);

// 图片
echo Lightbox::widget([
    'options' => [
        'tag' => 'image',
        'data-image' => 'http://zui.sexy/docs/img/img2.jpg',
        'data-caption' => '小图看大图',
        'class' => 'img-thumbnail',
        'style' => 'width:200px'
    ],
]);

// 图片(大图小图不一样)
echo Lightbox::widget([
    'options' => [
        'tag' => 'image',
        'src' => 'http://zui.sexy/docs/img/img3.jpg',
        'data-image' => 'http://zui.sexy/docs/img/img2.jpg',
        'data-caption' => '小图看大图',
        'class' => 'img-thumbnail',
        'style' => 'width:200px'
    ],
]);
```
渲染结果:
```html
<!-- 链接 -->
<a class="btn btn-primary" href="http://zui.sexy/docs/img/img2.jpg" data-caption="小图看大图" data-toggle="lightbox" data-lightbox-group="group1516858368983"><i class="icon icon-picture"></i> 浏览图片</a>

<!-- 按钮 -->
<button type="button" class="btn btn-primary" data-image="http://zui.sexy/docs/img/img2.jpg" data-caption="小图看大图" data-toggle="lightbox" data-lightbox-group="group1516858368983"><i class="icon icon-picture"></i> 浏览图片</button>

<!-- 图片 -->
<img class="img-thumbnail" src="http://zui.sexy/docs/img/img2.jpg" alt="" data-caption="小图看大图" style="width:200px" data-toggle="lightbox" data-lightbox-group="group1516858368983">

<!-- 图片(大图小图不一样) -->
<img class="img-thumbnail" src="http://zui.sexy/docs/img/img3.jpg" alt="" data-image="http://zui.sexy/docs/img/img2.jpg" data-caption="小图看大图" style="width:200px" data-toggle="lightbox" data-lightbox-group="group1516858368983">
```


### 浏览分组

为多个`data-toggle="lightbox"`指定相同的`data-group="*"`属性, 会启动分组浏览. 图片左右两侧会显示图片切换按钮.

```php
echo LightboxGroup::widget([
    'options' => ['class' => 'row'],
    'itemOptions' => ['class' => 'col-xs-6 col-sm-4 col-md-3'],
    'linkOptions' => ['data-group' => 'example-3'],
    'imageOptions' => ['class' => 'img-rounded'],
    'items' => [
        ['data-image' => 'http://zui.sexy/docs/img/img1.jpg', 'data-caption' => 'img1.jpg'],
        ['data-image' => 'http://zui.sexy/docs/img/img2.jpg', 'data-caption' => 'img2.jpg'],
        ['data-image' => 'http://zui.sexy/docs/img/img3.jpg'],
        ['data-image' => 'http://zui.sexy/docs/img/img4.jpg', 'data-caption' => '最后一张'],
    ],
]);
```
渲染结果:
```html
<div id="w0" class="row">
    <div class="col-xs-6 col-sm-4 col-md-3">
        <a href="http://zui.sexy/docs/img/img1.jpg" data-group="example-3" data-caption="img1.jpg" data-toggle="lightbox" data-lightbox-group="example-3">
            <img class="img-rounded" src="http://zui.sexy/docs/img/img1.jpg" alt="">
        </a>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-3">
        <a href="http://zui.sexy/docs/img/img2.jpg" data-group="example-3" data-caption="img2.jpg" data-toggle="lightbox" data-lightbox-group="example-3">
            <img class="img-rounded" src="http://zui.sexy/docs/img/img2.jpg" alt="">
        </a>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-3">
        <a href="http://zui.sexy/docs/img/img3.jpg" data-group="example-3" data-toggle="lightbox" data-lightbox-group="example-3">
           <img class="img-rounded" src="http://zui.sexy/docs/img/img3.jpg" alt="">
        </a>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-3">
        <a href="http://zui.sexy/docs/img/img4.jpg" data-group="example-3" data-caption="最后一张" data-toggle="lightbox" data-lightbox-group="example-3">
            <img class="img-rounded" src="http://zui.sexy/docs/img/img4.jpg" alt="">
        </a>
    </div>
</div>
```

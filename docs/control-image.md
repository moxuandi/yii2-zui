# [控件 - 图片](http://zui.sexy/#control/image)

### 圆角图片(`.img-rounded`)

```php
echo Html::img('http://zui.sexy/docs/img/img1.jpg', ['width' => '200px', 'height' => '200px', 'class' => 'img-rounded', 'alt' => '圆角图片']);
```
渲染结果:
```html
<img class="img-rounded" src="http://zui.sexy/docs/img/img1.jpg" alt="圆角图片" width="200px" height="200px">
```


### 圆形图片(`.img-circle`)

```php
echo Html::img('http://zui.sexy/docs/img/img2.jpg', ['width' => '200px', 'height' => '200px', 'class' => 'img-circle', 'alt' => '圆形图片']);
```
渲染结果:
```html
<img class="img-circle" src="http://zui.sexy/docs/img/img2.jpg" alt="圆形图片" width="200px" height="200px">
```


### 缩略图(`.img-thumbnail`)

```php
echo Html::img('http://zui.sexy/docs/img/img3.jpg', ['width' => '200px', 'height' => '200px', 'class' => 'img-thumbnail', 'alt' => '缩略图']);
```
渲染结果:
```html
<img class="img-thumbnail" src="http://zui.sexy/docs/img/img3.jpg" alt="缩略图" width="200px" height="200px">
```


### 响应式图片(`.img-responsive`)

图片最大宽度将不会超过父级容器.

```php
<div style="width: 250px">
echo Html::img('http://zui.sexy/docs/img/img4.jpg', ['class' => 'img-responsive', 'alt' => '响应式图片测试']);
</div>
```
渲染结果:
```html
<div style="width: 250px">
    <img class="img-responsive" src="http://zui.sexy/docs/img/img4.jpg" alt="响应式图片测试">
</div>
```

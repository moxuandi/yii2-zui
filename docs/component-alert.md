# [组件 - 消息框](http://zui.sexy/#component/alert)

消息框能够轻松展示一些需要引起用户注意的内容. 

### 不同感情色彩的消息框

这里提供了5中色彩的消息框用于不同场合. 

```php
// 普通
echo Alert::widget([
    'body' => '<h4>你好</h4><hr><p>有一些内容你可能需要知道. </p>'
]);
// .alert-primary
echo Alert::widget([
    'options' => ['class' => 'alert-primary'],
    'body' => '<h4>Hello</h4><hr><p>World.</p>'
]);
// .alert-success
echo Alert::widget([
    'options' => ['class' => 'alert-success'],
    'body' => '<h4>太好了!</h4><hr><strong>一切已准备就绪. </strong>'
]);
// .alert-info
echo Alert::widget([
    'options' => ['class' => 'alert-info'],
    'body' => '<strong>Hi!</strong> 这条消息可能需要你注意. '
]);
// .alert-warning
echo Alert::widget([
    'options' => ['class' => 'alert-warning'],
    'body' => '<strong>注意!</strong> 看起来遇到一些问题. '
]);
// .alert-danger
echo Alert::widget([
    'options' => ['class' => 'alert-danger'],
    'body' => '<h4>不好了!</h4><p>确实遇到了问题, 请立即处理吧. </p>'
]);
// 另一种方法
Alert::begin([
    'options' => ['class' => 'alert-danger'],
]);
echo '<h4>不好了!</h4><p>确实遇到了问题, 请立即处理吧. </p>';
Alert::end();
```
渲染结果:
```html
<!-- 普通 -->
<div class="alert">
    <h4>你好</h4><hr><p>有一些内容你可能需要知道. </p>
</div>
<!-- .alert-primary -->
<div class="alert alert-primary">
    <h4>Hello</h4><hr><p>World.</p>
</div>
<!-- .alert-success -->
<div class="alert alert-success">
    <h4>太好了!</h4><hr><strong>一切已准备就绪. </strong>
</div>
<!-- .alert-info -->
<div class="alert alert-info">
    <strong>Hi!</strong> 这条消息可能需要你注意. 
</div>
<!-- .alert-warning -->
<div class="alert alert-warning">
    <strong>注意!</strong> 看起来遇到一些问题. 
</div>
<!-- .alert-danger -->
<div class="alert alert-danger">
    <h4>不好了!</h4><p>确实遇到了问题, 请立即处理吧. </p>
</div>
<!-- 另一种方法 -->
<div class="alert alert-danger">
    <h4>不好了!</h4><p>确实遇到了问题, 请立即处理吧. </p>
</div>
```


### 使用图标

在消息框中使用醒目的合适的图标能更容易让用户接收. 需要使`.alert`配合`.with-icon`参数一起使用. 

```php
// 普通
echo Alert::widget([
    'icon' => ['class' => 'icon-inbox'],
    'body' => '<h4>你好</h4><hr><p>有一些内容你可能需要知道. </p>'
]);
// .alert-primary
echo Alert::widget([
    'options' => ['class' => 'alert-primary'],
    'icon' => ['class' => 'icon-star'],
    'body' => '<h4>Hello</h4><hr><p>World.</p>'
]);
// .alert-success
echo Alert::widget([
    'options' => ['class' => 'alert-success'],
    'icon' => ['class' => 'icon-ok-sign'],
    'body' => '<h4>太好了!</h4><hr><strong>一切已准备就绪. </strong>'
]);
// .alert-info
echo Alert::widget([
    'options' => ['class' => 'alert-info'],
    'icon' => ['class' => 'icon-info-sign'],
    'body' => '<strong>Hi!</strong> 这条消息可能需要你注意. '
]);
// .alert-warning
echo Alert::widget([
    'options' => ['class' => 'alert-warning'],
    'icon' => ['class' => 'icon-frown'],
    'body' => '<strong>注意!</strong> 看起来遇到一些问题. '
]);
// .alert-danger
echo Alert::widget([
    'options' => ['class' => 'alert-danger'],
    'icon' => ['class' => 'icon-remove-sign'],
    'body' => '<h4>不好了!</h4><p>确实遇到了问题, 请立即处理吧. </p>'
]);
```
渲染结果:
```html
<!-- 普通 -->
<div class="alert with-icon">
    <i class="icon-inbox"></i>
    <div class="content"><h4>你好</h4><hr><p>有一些内容你可能需要知道. </p></div>
</div>
<!-- .alert-primary -->
<div class="alert alert-primary with-icon">
    <i class="icon-star"></i>
    <div class="content"><h4>Hello</h4><hr><p>World.</p></div>
</div>
<!-- .alert-success -->
<div class="alert alert-success with-icon">
    <i class="icon-ok-sign"></i>
    <div class="content"><h4>太好了!</h4><hr><strong>一切已准备就绪. </strong></div>
</div>
<!-- .alert-info -->
<div class="alert alert-info with-icon">
    <i class="icon-info-sign"></i>
    <div class="content"><strong>Hi!</strong> 这条消息可能需要你注意. </div>
</div>
<!-- .alert-warning -->
<div class="alert alert-warning with-icon">
    <i class="icon-frown"></i>
    <div class="content"><strong>注意!</strong> 看起来遇到一些问题. </div>
</div>
<!-- .alert-danger -->
<div class="alert alert-danger with-icon">
    <i class="icon-remove-sign"></i>
    <div class="content"><h4>不好了!</h4><p>确实遇到了问题, 请立即处理吧. </p></div>
</div>
```


### 使用反色主题

```php
// .alert-inverse
echo Alert::widget([
    'options' => ['class' => 'alert-inverse'],
    'icon' => ['class' => 'icon-inbox'],
    'body' => '<h4>你好</h4><hr><p>有一些内容你可能需要知道. </p>'
]);
// .alert-primary-inverse
echo Alert::widget([
    'options' => ['class' => 'alert-primary-inverse'],
    'icon' => ['class' => 'icon-star'],
    'body' => '<h4>Hello</h4><hr><p>World.</p>'
]);
// .alert-success-inverse
echo Alert::widget([
    'options' => ['class' => 'alert-success-inverse'],
    'icon' => ['class' => 'icon-ok-sign'],
    'body' => '<h4>太好了!</h4><hr><strong>一切已准备就绪. </strong>'
]);
// .alert-info-inverse
echo Alert::widget([
    'options' => ['class' => 'alert-info-inverse'],
    'icon' => ['class' => 'icon-info-sign'],
    'body' => '<strong>Hi!</strong> 这条消息可能需要你注意. '
]);
// .alert-warning-inverse
echo Alert::widget([
    'options' => ['class' => 'alert-warning-inverse'],
    'icon' => ['class' => 'icon-frown'],
    'body' => '<strong>注意!</strong> 看起来遇到一些问题. '
]);
// .alert-danger-inverse
echo Alert::widget([
    'options' => ['class' => 'alert-danger-inverse'],
    'icon' => ['class' => 'icon-remove-sign'],
    'body' => '<h4>不好了!</h4><p>确实遇到了问题, 请立即处理吧. </p>'
]);
```
渲染结果:
```html
<!-- .alert-inverse -->
<div class="alert alert-inverse with-icon">
    <i class="icon-inbox"></i>
    <div class="content"><h4>你好</h4><hr><p>有一些内容你可能需要知道. </p></div>
</div>
<!-- .alert-primary-inverse -->
<div class="alert alert-primary-inverse with-icon">
    <i class="icon-star"></i>
    <div class="content"><h4>Hello</h4><hr><p>World.</p></div>
</div>
<!-- .alert-success-inverse -->
<div class="alert alert-success-inverse with-icon">
    <i class="icon-ok-sign"></i>
    <div class="content"><h4>太好了!</h4><hr><strong>一切已准备就绪. </strong></div>
</div>
<!-- .alert-info-inverse -->
<div class="alert alert-info-inverse with-icon">
    <i class="icon-info-sign"></i>
    <div class="content"><strong>Hi!</strong> 这条消息可能需要你注意. </div>
</div>
<!-- .alert-warning-inverse -->
<div class="alert alert-warning-inverse with-icon">
    <i class="icon-frown"></i>
    <div class="content"><strong>注意!</strong> 看起来遇到一些问题. </div>
</div>
<!-- .alert-danger-inverse -->
<div class="alert alert-danger-inverse with-icon">
    <i class="icon-remove-sign"></i>
    <div class="content"><h4>不好了!</h4><p>确实遇到了问题, 请立即处理吧. </p></div>
</div>
```


### 块级消息

块级消息框将没有外边距和边框圆角, 适合用在页面顶部或者浮现在页面之上

```php
echo Alert::widget([
    'options' => ['class' => 'alert-success alert-block'],
    'icon' => ['class' => 'icon-ok-sign'],
    'body' => '<strong>太好了!</strong> 一切已准备就绪. '
]);
```
渲染结果:
```html
<div class="alert alert-success alert-block with-icon">
    <i class="icon-ok-sign"></i>
    <div class="content"><strong>太好了!</strong> 一切已准备就绪. </div>
</div>
```


### 消息框中的链接

当消息框中包含链接时, 推荐使用工具栏`.alert-link`来使得链接的样式与消息框类型保持一致. 

```php
// 普通
echo Alert::widget([
    'icon' => ['class' => 'icon-inbox'],
    'body' => '<strong>你好!</strong> <a class="alert-link" href="#">有一些内容</a>你可能需要知道. '
]);
// .alert-primary
echo Alert::widget([
    'options' => ['class' => 'alert-primary'],
    'icon' => ['class' => 'icon-star'],
    'body' => '<h4>Hello</h4><hr><p><a class="alert-link" href="#">World.</a></p>'
]);
// .alert-success
echo Alert::widget([
    'options' => ['class' => 'alert-success'],
    'icon' => ['class' => 'icon-ok-sign'],
    'body' => '<strong>太好了!</strong> 一切已<a class="alert-link" href="#">准备就绪</a>. '
]);
// .alert-info
echo Alert::widget([
    'options' => ['class' => 'alert-info'],
    'icon' => ['class' => 'icon-info-sign'],
    'body' => '<strong>Hi!</strong> 这条消息可能<a class="alert-link" href="#">需要你注意</a>. '
]);
// .alert-warning
echo Alert::widget([
    'options' => ['class' => 'alert-warning'],
    'icon' => ['class' => 'icon-frown'],
    'body' => '<strong>注意!</strong> 看起来遇到<a class="alert-link" href="#">一些问题</a>. '
]);
// .alert-danger
echo Alert::widget([
    'options' => ['class' => 'alert-danger'],
    'icon' => ['class' => 'icon-remove-sign'],
    'body' => '<strong>不好了!</strong> 确实遇到了问题, 请<a class="alert-link" href="#">立即处理</a>吧. '
]);
```
渲染结果:
```html
<!-- 普通 -->
<div class="alert with-icon">
    <i class="icon-inbox"></i>
    <div class="content"><strong>你好!</strong> <a class="alert-link" href="#">有一些内容</a>你可能需要知道. </div>
</div>
<!-- .alert-primary -->
<div class="alert alert-primary with-icon">
    <i class="icon-star"></i>
    <div class="content"><h4>Hello</h4><hr><p><a class="alert-link" href="#">World.</a></p></div>
</div>
<!-- .alert-success -->
<div class="alert alert-success with-icon">
    <i class="icon-ok-sign"></i>
    <div class="content"><strong>太好了!</strong> 一切已<a class="alert-link" href="#">准备就绪</a>. </div>
</div>
<!-- .alert-info -->
<div class="alert alert-info with-icon">
    <i class="icon-info-sign"></i>
    <div class="content"><strong>Hi!</strong> 这条消息可能<a class="alert-link" href="#">需要你注意</a>. </div>
</div>
<!-- .alert-warning -->
<div class="alert alert-warning with-icon">
    <i class="icon-frown"></i>
    <div class="content"><strong>注意!</strong> 看起来遇到<a class="alert-link" href="#">一些问题</a>. </div>
</div>
<!-- .alert-danger -->
<div class="alert alert-danger with-icon">
    <i class="icon-remove-sign"></i>
    <div class="content"><strong>不好了!</strong> 确实遇到了问题, 请<a class="alert-link" href="#">立即处理</a>吧. </div>
</div>
```


### 可以关闭的消息框

可以用一个可选的`.alert-dismissable`和关闭按钮. 

```php
echo Alert::widget([
    'options' => ['class' => 'alert-warning'],
    'icon' => ['class' => 'icon-frown'],
    'closeButton' => [],
    'body' => '<strong>注意!</strong> 看起来遇到一些问题. <p>您可以点击右上角的 <i class="icon-remove"></i> 来关闭这条消息. </p>'
]);
```
渲染结果:
```html
<div class="alert alert-warning alert-dismissable with-icon">
    <i class="icon-frown"></i>
    <div class="content">
        <strong>注意!</strong> 看起来遇到一些问题. 
        <p>您可以点击右上角的 <i class="icon-remove"></i> 来关闭这条消息. </p>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
</div>
```


### 从 $session 中渲染消息框信息

```php
controller:
Yii::$app->session->setFlash('error', 'This is the message');

view:
echo AlertWidget::widget([
    'closeButton' => [],  // 关闭按钮
    'icon' => [],  // 图标
    'inverse' => true,  // 反色主题
]);
```
渲染结果:
```html
<div id="w0-error-0" class="alert alert-danger-inverse alert-dismissable with-icon">
    <i class="icon-remove-sign"></i>
    <div class="content">This is the message</div>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
</div>
```

# [控件 - 进度条](http://zui.sexy/#control/progressbar)


进度条使用了CSS3的transition和animation属性来完成一些效果. 这些特性在Internet Explorer 9或以下版本中、Firefox的老版本中没有被支持. Opera 12不支持animation属性.

### 基本类型

为`.progress-bar`应用CSS的width值(%)来更改进度值.

```php
echo Progress::widget(['percent' => 37]);
```
渲染结果:
```html
<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100" style="width:37%"><span class="sr-only">37% Complete</span></div>
</div>
```


### 颜色主题

为了一致的样式, 进度条颜色使用与按钮相同的类.

```php
// 主要/默认
echo Progress::widget([
    'percent' => 40,
    'label' => '主要/默认',
]);
// .progress-bar-info
echo Progress::widget([
    'percent' => 40,
    'label' => '.progress-bar-info',
    'barOptions' => ['class' => 'progress-bar-info'],
]);
// .progress-bar-success
echo Progress::widget([
    'percent' => 40,
    'label' => '.progress-bar-success',
    'barOptions' => ['class' => 'progress-bar-success'],
]);
// .progress-bar-warning
echo Progress::widget([
    'percent' => 60,
    'label' => '.progress-bar-warning',
    'barOptions' => ['class' => 'progress-bar-warning'],
]);
// .progress-bar-danger
echo Progress::widget([
    'percent' => 80,
    'label' => '.progress-bar-danger',
    'barOptions' => ['class' => 'progress-bar-danger'],
]);
```
渲染结果:
```html
<!-- 主要/默认 -->
<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">主要/默认<span class="sr-only">40% Complete</span></div>
</div>
<!-- .progress-bar-info -->
<div class="progress">
    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">.progress-bar-info<span class="sr-only">40% Complete</span></div>
</div>
<!-- .progress-bar-success -->
<div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">.progress-bar-success<span class="sr-only">40% Complete</span></div>
</div>
<!-- .progress-bar-warning -->
<div class="progress">
    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">.progress-bar-warning<span class="sr-only">60% Complete</span></div>
</div>
<!-- .progress-bar-danger -->
<div class="progress">
    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">.progress-bar-danger<span class="sr-only">80% Complete</span></div>
</div>
```


### 特殊效果

用一个渐变可以创建条纹效果, 在IE8中不可用.

```php
// 条纹效果:`.progress-striped`
echo Progress::widget([
    'percent' => 40,
    'label' => '条纹效果',
    'options' => ['class' => 'progress-striped'],
    'barOptions' => ['class' => 'progress-bar-success']
]);
// 动画效果:给`.progress-striped`加上`.active`使它由右向左运动. 在IE的所有版本不可用. 
echo Progress::widget([
    'percent' => 45,
    'label' => '动画效果',
    'options' => ['class' => 'progress-striped active'],
    'barOptions' => ['class' => 'progress-bar-info']
]);
// 堆叠效果: 把多个进度条放入同一个`.progress`, 使它们堆叠. 
echo Progress::widget([
    'bars' => [
        ['percent' => 35, 'options' => ['class' => 'progress-bar-success']],
        ['percent' => 20, 'label' => '堆叠效果', 'options' => ['class' => 'progress-bar-warning']],
        ['percent' => 10, 'options' => ['class' => 'progress-bar-danger']],
    ]
]);
```
渲染结果:
```html
<!-- 条纹效果 -->
<div class="progress progress-striped">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">条纹效果<span class="sr-only">40% Complete</span></div>
</div>
<!-- 动画效果 -->
<div class="progress progress-striped active">
    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:45%">动画效果<span class="sr-only">45% Complete</span></div>
</div>
<!-- 堆叠效果 -->
<div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width:35%"><span class="sr-only">35% Complete</span></div>
    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">堆叠效果<span class="sr-only">20% Complete</span></div>
    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%"><span class="sr-only">10% Complete</span></div>
</div>
```

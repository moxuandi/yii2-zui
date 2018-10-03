# [控件 - 图标](http://zui.sexy/#control/icon)


### 用法

使用一个单独的`<span>`标签或者`<i>`并增加对应的CSS类名即可, 用来作为图标的标签不需要包含任何文本也不应该如此.

```php
echo Html::icon('flag');
echo Html::icon('flag', ['tag' => 'span']);
```
渲染结果:
```html
<i class="icon icon-flag"></i>
<span class="icon icon-flag"></span>
```


### 等宽图标

通常情况下`.icon-*`不需要和`.icon`类一起使用, 但由于不同的图标外形不同, 其在文字行中所占据的宽度也不同, 如果需要使图标的宽度一致, 则需要为`.icon-*`添加`.icon`类, 这样就得到等宽图标.

```php
// 等宽图标
echo Html::icon('flag');
echo Html::icon('heart');
echo Html::icon('film');

// 非等宽图标
echo Html::icon('flag', ['prefix' => 'icon-']);
echo Html::icon('heart', ['prefix' => 'icon-']);
echo Html::icon('film', ['prefix' => 'icon-']);
```
渲染结果:
```html
<!-- 等宽图标 -->
<i class="icon icon-flag"></i>
<i class="icon icon-heart"></i>
<i class="icon icon-film"></i>

<!-- 非等宽图标 -->
<i class="icon-flag"></i>
<i class="icon-heart"></i>
<i class="icon-film"></i>
```


### 预设的图标尺寸

```php
// 正常大小:
echo Html::icon('flag');
// 比正常大1/3:
echo Html::icon('flag', ['class' => 'icon-lg']);
// 2x:
echo Html::icon('flag', ['class' => 'icon-2x']);
// 3x:
echo Html::icon('flag', ['class' => 'icon-3x']);
// 4x:
echo Html::icon('flag', ['class' => 'icon-4x']);
// 5x:
echo Html::icon('flag', ['class' => 'icon-5x']);
```
渲染结果:
```html
<i class="icon icon-flag"></i>
<i class="icon icon-flag icon-lg"></i>
<i class="icon icon-flag icon-2x"></i>
<i class="icon icon-flag icon-3x"></i>
<i class="icon icon-flag icon-4x"></i>
<i class="icon icon-flag icon-5x"></i>
```


### 旋转

```php
// 不旋转:
echo Html::icon('flag');
// 旋转90度:
echo Html::icon('flag', ['class' => 'icon-rotate-90']);
// 旋转180度:
echo Html::icon('flag', ['class' => 'icon-rotate-180']);
// 旋转270度:
echo Html::icon('flag', ['class' => 'icon-rotate-270']);
// 水平翻转:
echo Html::icon('flag', ['class' => 'icon-flip-horizontal']);
// 垂直翻转:
echo Html::icon('flag', ['class' => 'icon-flip-vertical']);
```
渲染结果:
```html
<i class="icon icon-flag"></i>
<i class="icon icon-flag icon-rotate-90"></i>
<i class="icon icon-flag icon-rotate-180"></i>
<i class="icon icon-flag icon-rotate-270"></i>
<i class="icon icon-flag icon-flip-horizontal"></i>
<i class="icon icon-flag icon-flip-vertical"></i>
```


#### 旋转动画

使用旋转动画方便制作用于加载指示的动画效果.

```php
echo Html::icon('spinner-snake', ['class' => 'icon-spin']);
echo Html::icon('spinner-indicator', ['class' => 'icon-spin']);
echo Html::icon('circle-o-notch', ['class' => 'icon-spin']);
echo Html::icon('cog', ['class' => 'icon-spin']);
echo Html::icon('refresh', ['class' => 'icon-spin']);
echo Html::icon('spinner', ['class' => 'icon-spin']);
```
渲染结果:
```html
<i class="icon icon-spinner-snake icon-spin"></i>
<i class="icon icon-spinner-indicator icon-spin"></i>
<i class="icon icon-circle-o-notch icon-spin"></i>
<i class="icon icon-cog icon-spin"></i>
<i class="icon icon-refresh icon-spin"></i>
<i class="icon icon-spinner icon-spin"></i>
```

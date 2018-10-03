# [控件 - 面包屑](http://zui.sexy/#control/breadcrumb)

### 示例

```php
echo \yii\widgets\Breadcrumbs::widget([
     'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
     'encodeLabels' => false,
     'homeLink' => [
         'label' => '<i class="icon icon-home"></i> 首页',
         'url' => ''
     ]
 ]);
```
渲染结果:
```html
<ul class="breadcrumb">
    <li><a href="/"><i class="icon icon-home"></i> 首页</a></li>
    <li><a href="/site/index">目录</a></li>
    <li class="active">存档</li>
</ul>
```

# [组件 - 分页条](http://zui.sexy/#component/pager)

### 在网格视图中使用

```php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'options' => ['class' => 'pager'],
    ],
]);
```


### 单独使用分页条

```php
echo LinkPager::widget([
    'pagination' => $pages,
    'options' => ['class' => 'pager'],
]);
```


### 各种分页导航

### 禁用的导航

### 圆角样式(`.pager-pills`)

### 宽松样式(`.pager-loose`)

### 两端对齐(`.pager-justify`)

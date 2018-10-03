# [组件 - 表格](http://zui.sexy/#component/table)

### 在网格视图中使用

```php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'class' => 'grid-view table-responsive',  // 响应式表格
    ],
    'tableOptions' => [
        'class' => 'table table-striped table-bordered table-hover'
    ],
    'pager' => [
        'options' => ['class' => 'pager'],  // 分页条
    ],
]);
```


### 基本类型(`.table`)

### 隔行交替样式(`.table-striped`)

### 响应鼠标悬停(`.table-hover`)

### 带所有边框的表格(`.table-bordered`)

### 不带边框的表格(`.table-borderless`)

### 自动宽度的表格(`.table-auto`)

### 更为紧凑的表格(`.table-condensed`)

### 固定布局的表格(`.table-fixed`)

### 响应式表格(`div.table-responsive > .table`)

### 色彩主题
`.table tr.success`
`.table tr.danger`
`.table tr.warning`
`.table tr.active`

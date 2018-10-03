# [JS插件 - 日期选择](http://zui.sexy/#javascript/datetimepicker)

日期选择插件可以帮助用户更方便准确的选择日期和时间.

### 日期选择

```php
// 选择年月日
echo $form->field($model, 'demo')->widget('moxuandi\zui\DateTimePicker');

// 选择年月
echo $form->field($model, 'demo')->widget('moxuandi\zui\DateTimePicker', [
    'phpFormat' => 'Y-m',
    'clientOptions' => [
        'minView' => 3,
        'startView' => 3,
        'format' => 'yyyy-mm',
    ],
]);

// 选择年
echo $form->field($model, 'demo')->widget('moxuandi\zui\DateTimePicker', [
    'phpFormat' => 'Y',
    'clientOptions' => [
        'minView' => 4,
        'startView' => 4,
        'format' => 'yyyy',
    ],
]);

// 无model调用:
echo DateTimePicker::widget([
    'name' => 'demo',  // 必须设置
    'value' => $model->demo,
]);
```


### 时间选择

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\DateTimePicker', [
    'phpFormat' => 'H:i',
    'clientOptions' => [
        'minView' => 0,
        'maxView' => 1,
        'startView' => 1,
        'format' => 'hh:ii',
        'todayBtn' => false,
    ],
]);

// 无model调用:
echo DateTimePicker::widget([
    'name' => 'demo',  // 必须设置
    'value' => $model->demo,
    'phpFormat' => 'H:i',
    'clientOptions' => [
        'minView' => 0,
        'maxView' => 1,
        'startView' => 1,
        'format' => 'hh:ii',
        'todayBtn' => false,
    ],
]);
```


### 日期+时间选择

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\DateTimePicker', [
    'phpFormat' => 'Y-m-d H:i',
    'clientOptions' => [
        'minView' => 0,
        'startView' => 2,
        'format' => 'yyyy-mm-dd hh:ii',
    ],
]);

// 无model调用:
echo DateTimePicker::widget([
    'name' => 'demo',  // 必须设置
    'value' => $model->demo,
    'phpFormat' => 'Y-m-d H:i',
    'clientOptions' => [
        'minView' => 0,
        'startView' => 2,
        'format' => 'yyyy-mm-dd hh:ii',
    ],
]);
```


### 禁止用户输入(必须选择)

```php
echo $form->field($model, 'demo')->widget('moxuandi\zui\DateTimePicker', [
    'options' => [
        'class' => 'form-control',
        'readonly' => 'readonly',
    ],
]);
```


### 使用输入框组 ----- 未实现

# yii2-zui 修改
为兼容 Yii2 的验证功能, 将zui.css中关于`.required`的三条css样式移除.

zui-form:
```html
<div class="form-group">
    <label for="exampleInputAccount8" class="required">账号</label>
    <input type="text" class="form-control" id="exampleInputAccount8" placeholder="电子邮件/手机号/用户名">
</div>
```

yii2-form:
```html
<div class="form-group required">
    <label for="exampleInputAccount8">账号</label>
    <input type="text" class="form-control" id="exampleInputAccount8" placeholder="电子邮件/手机号/用户名">
</div>
```

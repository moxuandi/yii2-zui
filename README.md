[Twitter ZUI Extension for Yii 2](http://zui.sexy)
================


安装:
------------
使用 [composer](http://getcomposer.org/download/) 下载:
```
# 2.x(yii >= 2.0.16):
composer require moxuandi/yii2-zui:"~2.0"

# 1.x(非重要Bug, 不再更新):
composer require moxuandi/yii2-zui:"~1.0"

# 开发版:
composer require moxuandi/yii2-zui:"dev-master"
```


#### 控件:
-   图标: [Html::icon()](docs/control-icon.md)
-   按钮: [Button & ToggleButtonGroup](docs/control-button.md)
-   进度条: [Progress](docs/control-progressbar.md)
-   标签: [查看用法](docs/control-label.md)
-   表单控件: ActiveForm & ActiveField(表单类, 测试开发时再处理)
-   多选和单选框: ActiveForm & ActiveField(表单类, 测试开发时再处理)
-   开关: [SwitchInput](docs/control-switch.md)
-   面包屑: [查看用法](docs/control-breadcrumb.md)
-   图片: [查看用法](docs/control-image.md)
-   多级标题([查看官方文档](http://zui.sexy/#control/header)): `<h1>`(26px), `<h2>`(20px), `<h3>`(16px), `<h4>`(14px), `<h5>`(13px), `<h6>`(12px), `.header-dividing`, `.page-header`.
-   分割线([查看官方文档](http://zui.sexy/#control/divider)): `<hr>`(普通), `<hr.divider>`(margin=0), `<hr.divider-sm>`(margin=10).
-   滚动条([查看官方文档](http://zui.sexy/#control/scrollbar)): `.scrollbar-hover`.

#### 组件:
-   输入框: ActiveForm & ActiveField(表单类, 测试开发时再处理)
-   消息框: [Alert & AlertWidget](docs/component-alert.md)
-   代码([查看官方文档](http://zui.sexy/#component/code)): `<code>`, `<kbd>`, `<pre>`, `.code`, `pre.pre-scrollable`.
-   代码 - 代码高亮: [Prettify](docs/component-code-prettify.md)
-   输入组: ActiveForm & ActiveField(表单类, 测试开发时再处理)
-   列表组: [ListGroup](docs/component-listgroup.md)
-   导航: [Nav](docs/component-nav.md)
-   导航条: [NavBar](docs/component-navbar.md)
-   垂直菜单: v1.8.1正式移除
-   分页条: [查看用法](docs/component-pager.md)
-   面板: [Panel](docs/component-panel.md)
-   表格: [查看用法](docs/component-table.md)
-   按钮组: [ButtonGroup](docs/component-buttongroup.md)

#### JS插件:
-   搜索框: (表单类, 测试开发时再处理)
-   上下文菜单: (此功能暂不考虑)
-   分页器: (此功能暂不考虑)
-   本地存储: (此功能暂不考虑)
-   对话框: [Modal](docs/javascript-modal.md)
-   对话框触发器: [ModalTrigger](docs/javascript-modaltrigger.md)
-   下拉菜单: [Dropdown & ButtonDropdown](docs/javascript-dropdown.md)
-   标签页: [Tab](docs/javascript-tab.md)
-   漂浮消息: (js模式, 此功能暂不考虑)
-   提示消息: (js模式, 此功能暂不考虑)
-   弹出面板: [PopoverPanel(静态类型) & Popover(动态类型)](docs/javascript-popover.md)
-   折叠: [Collapse & CollapsePanel](docs/javascript-collapse.md)
-   轮播: [Carousel](docs/javascript-carousel.md)
-   日期选择: [DateTimePicker](docs/javascript-datetimepicker.md)
-   Chosen: [Chosen & ChosenIcons](docs/javascript-chosen.md)
-   富文本编辑器: (独立组件)
-   Color: (js模式)
-   拖动: (js模式)
-   拖放: (js模式)
-   拖放排序: (独立组件)
-   拖拽选取: (独立组件)
-   颜色颜色器: [ColorPicker](docs/javascript-colorpicker.md)
-   模态对话框: (独立组件)
-   图片剪切: (独立组件)
-   滚动监听: (此功能暂不考虑)

#### 视图:
-   数据表格(2): (独立组件)
-   标签页管理: (独立组件)
-   树形菜单: [Tree](docs/view-tree.md)
-   文件上传: (独立组件)
-   日历: (独立组件)
-   表单: ActiveForm & ActiveField
-   文章: [查看用法](docs/view-article.md)
-   卡片: [查看用法](docs/view-card.md)
-   列表: [查看用法](docs/view-list.md)
-   评论: [查看用法](docs/view-comment.md)
-   图表: (独立组件)
-   组织结构图: (独立组件)
-   看板: (独立组件)
-   仪表板: (独立组件)
-   图片浏览: [Lightbox & LightboxGroup](docs/view-lightbox.md)
-   数据表格: (独立组件)

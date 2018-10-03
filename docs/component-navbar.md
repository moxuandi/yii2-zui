# [组件 - 导航条](http://zui.sexy/#component/navbar)

### 简单导航条

简单导航条没有明显的外观设置, 可以方便用于进行个性化定制.

在导航条`.navbar`内使用`.container-fluid`或`.contianer`来控制导航项目是否居中或者两端对齐.

```php
NavBar::begin([
    'brandLabel' => 'ZUI',
    'screenReaderToggleText' => '切换导航'
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => '项目', 'url' => '#'],
        ['label' => '需求', 'url' => '#'],
        ['label' => '测试', 'url' => '#'],
        ['label' => '管理', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => '待办', 'url' => '#'],
            ['label' => 'Bug', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
NavBar::end();
```
渲染结果:
```html
<nav id="w0" class="navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ZUI</a>
        </div>
        <div id="w0-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">项目</a></li>
                <li><a href="#">需求</a></li>
                <li><a href="#">测试</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" tabindex="-1">任务</a></li>
                        <li><a href="#" tabindex="-1">待办</a></li>
                        <li><a href="#" tabindex="-1">Bug</a></li>
                        <li class="divider"></li>
                        <li><a href="#" tabindex="-1">用例</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
```


### 默认导航条(`.navbar-default`)

```php
NavBar::begin([
    'brandLabel' => 'ZUI',
    'screenReaderToggleText' => '切换导航',
    'options' => ['class' => 'navbar-default']
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => '项目', 'url' => '#'],
        ['label' => '需求', 'url' => '#'],
        ['label' => '测试', 'url' => '#'],
        ['label' => '管理', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => '待办', 'url' => '#'],
            ['label' => 'Bug', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
NavBar::end();
```
渲染结果:
```html
<nav id="w0" class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ZUI</a>
        </div>
        <div id="w0-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">项目</a></li>
                <li><a href="#">需求</a></li>
                <li><a href="#">测试</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" tabindex="-1">任务</a></li>
                        <li><a href="#" tabindex="-1">待办</a></li>
                        <li><a href="#" tabindex="-1">Bug</a></li>
                        <li class="divider"></li>
                        <li><a href="#" tabindex="-1">用例</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
```


### 深色导航条(`.navbar-inverse`)

```php
NavBar::begin([
    'brandLabel' => 'ZUI',
    'screenReaderToggleText' => '切换导航',
    'options' => ['class' => 'navbar-inverse']
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => '项目', 'url' => '#'],
        ['label' => '需求', 'url' => '#'],
        ['label' => '测试', 'url' => '#'],
        ['label' => '管理', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => '待办', 'url' => '#'],
            ['label' => 'Bug', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
NavBar::end();
```
渲染结果:
```html
<nav id="w0" class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ZUI</a>
        </div>
        <div id="w0-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">项目</a></li>
                <li><a href="#">需求</a></li>
                <li><a href="#">测试</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" tabindex="-1">任务</a></li>
                        <li><a href="#" tabindex="-1">待办</a></li>
                        <li><a href="#" tabindex="-1">Bug</a></li>
                        <li class="divider"></li>
                        <li><a href="#" tabindex="-1">用例</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
```


### 使用表单元素

```php
NavBar::begin([
    'brandLabel' => 'ZUI',
    'screenReaderToggleText' => '切换导航',
    'options' => ['class' => 'navbar-default']
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => '项目', 'url' => '#'],
        ['label' => '需求', 'url' => '#'],
        ['label' => '测试', 'url' => '#'],
        ['label' => '管理', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => '待办', 'url' => '#'],
            ['label' => 'Bug', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
$form = ActiveForm::begin([
    'options' => [
        'class' => 'navbar-form navbar-left',
        'role' => 'search'
    ]
]);
echo $form->field($model, 'demo')->textInput(['placeholder' => '搜索'])->label(false)->hint(false)->error(false);
echo Button::widget([
    'label' => '搜索',
    'options' => ['class' => 'btn-default', 'type' => 'submit']
]);
ActiveForm::end();
NavBar::end();
```
渲染结果:
```html
<nav id="w0" class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ZUI</a>
        </div>
        <div id="w0-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">项目</a></li>
                <li><a href="#">需求</a></li>
                <li><a href="#">测试</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" tabindex="-1">任务</a></li>
                        <li><a href="#" tabindex="-1">待办</a></li>
                        <li><a href="#" tabindex="-1">Bug</a></li>
                        <li class="divider"></li>
                        <li><a href="#" tabindex="-1">用例</a></li>
                    </ul>
                </li>
            </ul>
            <form id="w1" class="navbar-form navbar-left" action="/" method="post" role="search">
                <input name="_csrf-frontend" value="Ks4UyMXp7IPCmojYXzVrx8VKX6R8nY9VdaT36TvwFkpYIfQoBLt2om44fKowExe98-E8LJemldfnJNCmWlqHrg==" type="hidden">
                <div class="form-group field-user-demo">
                    <input id="user-demo" class="form-control" name="User[demo]" placeholder="搜索" aria-required="true" type="text">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
        </div>
    </div>
</nav>
```


### 将内容放置与导航右侧

```php
NavBar::begin([
    'brandLabel' => 'ZUI',
    'screenReaderToggleText' => '切换导航',
    'options' => ['class' => 'navbar-default']
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => '项目', 'url' => '#'],
        ['label' => '需求', 'url' => '#'],
        ['label' => '测试', 'url' => '#'],
        ['label' => '管理', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => '待办', 'url' => '#'],
            ['label' => 'Bug', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        ['label' => '帮助', 'url' => '#'],
        ['label' => '探索', 'items' => [
            ['label' => '敏捷开发', 'url' => '#'],
            ['label' => 'HTML5', 'url' => '#'],
            ['label' => 'Javascript', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '探索宇宙', 'url' => '#']
        ]]
    ]
]);
NavBar::end();
```
渲染结果:
```html
<nav id="w0" class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ZUI</a>
        </div>
        <div id="w0-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">项目</a></li>
                <li><a href="#">需求</a></li>
                <li><a href="#">测试</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" tabindex="-1">任务</a></li>
                        <li><a href="#" tabindex="-1">待办</a></li>
                        <li><a href="#" tabindex="-1">Bug</a></li>
                        <li class="divider"></li>
                        <li><a href="#" tabindex="-1">用例</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">帮助</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">探索 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" tabindex="-1">敏捷开发</a></li>
                        <li><a href="#" tabindex="-1">HTML5</a></li>
                        <li><a href="#" tabindex="-1">Javascript</a></li>
                        <li class="divider"></li>
                        <li><a href="#" tabindex="-1">探索宇宙</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
```


### 自适应宽度

在`.nav`上添加`.nav-justified`. 

```php
NavBar::begin([
    'brandLabel' => false,
    'screenReaderToggleText' => '切换导航',
    'options' => ['class' => 'navbar-default']
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav nav-justified'],
    'items' => [
        ['label' => '首页', 'url' => '#'],
        ['label' => '项目', 'url' => '#'],
        ['label' => '需求', 'url' => '#'],
        ['label' => '测试', 'url' => '#'],
        ['label' => '管理', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => '待办', 'url' => '#'],
            ['label' => 'Bug', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
NavBar::end();
```
渲染结果:
```html
<nav id="w0" class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="w0-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav nav-justified">
                <li><a href="#">首页</a></li>
                <li class="active"><a href="#">项目</a></li>
                <li><a href="#">需求</a></li>
                <li><a href="#">测试</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" tabindex="-1">任务</a></li>
                        <li><a href="#" tabindex="-1">待办</a></li>
                        <li><a href="#" tabindex="-1">Bug</a></li>
                        <li class="divider"></li>
                        <li><a href="#" tabindex="-1">用例</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
```


### 固定在顶部(`.navbar-fixed-top`)或底部(`.navbar-fixed-bottom`)或未定位的顶部(`.navbar-static-top`)

```php
NavBar::begin([
    'brandLabel' => 'ZUI',
    'screenReaderToggleText' => '切换导航',
    'options' => ['class' => 'navbar-default navbar-fixed-top']
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => '项目', 'url' => '#'],
        ['label' => '需求', 'url' => '#'],
        ['label' => '测试', 'url' => '#'],
        ['label' => '管理', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => '待办', 'url' => '#'],
            ['label' => 'Bug', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
NavBar::end();
```
渲染结果:
```html
<nav id="w0" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ZUI</a>
        </div>
        <div id="w0-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">项目</a></li>
                <li><a href="#">需求</a></li>
                <li><a href="#">测试</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" tabindex="-1">任务</a></li>
                        <li><a href="#" tabindex="-1">待办</a></li>
                        <li><a href="#" tabindex="-1">Bug</a></li>
                        <li class="divider"></li>
                        <li><a href="#" tabindex="-1">用例</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
```


### 其它类的应用(`.navbar-text`,`.navbar-link`,`.btn-link`,`.navbar-btn`,`.navbar-brand > img`)

```php
NavBar::begin([
    'brandLabel' => 'ZUI',
    //'brandLabel' => '<img src="http://www.zhangmoxuan.com/frontend/web/images/logo.png">',
    'brandOptions' => ['class' => 'navbar-link'],
    'screenReaderToggleText' => '切换导航',
    'options' => ['class' => 'navbar-default']
]);
echo '<p class="navbar-text">切换导航</p>';
echo Button::widget([
    'label' => 'Sign in',
    'options' => ['class' => 'btn-default navbar-btn']
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => '项目', 'url' => '#'],
        ['label' => '需求', 'url' => '#'],
        ['label' => '测试', 'url' => '#'],
        ['label' => '管理', 'items' => [
            ['label' => '任务', 'url' => '#'],
            ['label' => '待办', 'url' => '#'],
            ['label' => 'Bug', 'url' => '#'],
            '<li class="divider"></li>',
            ['label' => '用例', 'url' => '#']
        ]]
    ]
]);
$form = ActiveForm::begin([
    'options' => [
        'class' => 'navbar-form navbar-left',
        'role' => 'search'
    ]
]);
echo $form->field($model, 'demo')->textInput(['placeholder' => '搜索'])->label(false)->hint(false)->error(false);
echo Button::widget([
    'label' => '搜索',
    'options' => ['class' => 'btn-link', 'type' => 'submit']
]);
ActiveForm::end();
NavBar::end();
```
渲染结果:
```html
<nav id="w0" class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand navbar-link" href="/">ZUI</a>
        </div>
        <div id="w0-collapse" class="collapse navbar-collapse">
            <p class="navbar-text">切换导航</p>
            <button type="button" class="btn btn-default navbar-btn">Sign in</button>
            <ul class="nav navbar-nav">
                <li><a href="#">项目</a></li>
                <li><a href="#">需求</a></li>
                <li><a href="#">测试</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" tabindex="-1">任务</a></li>
                        <li><a href="#" tabindex="-1">待办</a></li>
                        <li><a href="#" tabindex="-1">Bug</a></li>
                        <li class="divider"></li>
                        <li><a href="#" tabindex="-1">用例</a></li>
                    </ul>
                </li>
            </ul>
            <form id="w1" class="navbar-form navbar-left" action="/" method="post" role="search">
                <input name="_csrf-frontend" value="8SE3_YAGng4_xJMwEH6vyaw1QSLDWc8LX5ZVRxe9DlSDztcdQVQEL5NmZ0J_WNOzmp4iqihi1YnNFnIIdhefsA==" type="hidden">
                <div class="form-group field-user-demo">
                    <input id="user-demo" class="form-control" name="User[demo]" placeholder="搜索" aria-required="true" type="text">
                </div>
                <button type="submit" class="btn btn-link">搜索</button>
            </form>
        </div>
    </div>
</nav>
```

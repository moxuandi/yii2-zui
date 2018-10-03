# [视图 - 列表](http://zui.sexy/#view/list)

列表视图用于展示一组包含图文的内容.

### css类样式列表
 - [`.list`](#结构): 列表视图的父级容器;
 - [`.list > header`](#结构): 列表视图的头部, 标题等信息;
 - [`.list > .items`](#结构): 列表视图中的列表项组, 可以在`.list`内堆叠多个列表项组;
 - [`.list > footer`](#结构): 列表视图的底部, 显示分页信息等;
 - [`.items > .item`](#列表项): 列表项, 所有列表项都必须作为列表项组`.items`的直接子元素;
 - [`.item > .item-heading`](#列表项): 列表项的标题容器;
 - [`.item > .item-content`](#列表项): 列表项的附加内容容器;
 - [`.item > .item-footer`](#列表项): 列表项的底部信息容器;
 - [`.item > .item-content > .media`](#包含缩略图): 列表项中的缩略图. 配合`.pull-left`或`.pull-right`来让缩略图居左或居右放置;
 - [`.items.items-hover`](#鼠标悬停效果): 为列表项添加鼠标悬停效果(鼠标悬停时列表项`.item`背景变成灰色);
 - [`.list.list-condensed`](#更紧凑的列表): 更紧凑的列表;


### 结构

列表使用`.list`作为父级容器, 一般 HTML 结构如下:

列表项组`.items`也可以脱离列表容器`.list`单独使用.

```html
<div class="list">
  <!-- 列表头部 -->
  <header>
    <h1>列表标题</h1>
  </header>
  <!-- 列表项组 -->
  <section class="items">
    <div class="item"></div>
    ...
  </section>
  <!-- 列表底部 -->
  <footer>
    <ul class="pager pager-justify">
      <li class="previous"><a href="#"><i class="icon-arrow-left"></i> 上一页</a></li>
      <li class="next disabled"><a href="#">没有下一页 <i class="icon-arrow-right"></i></a></li>
    </ul>
  </footer>
</div>
```


### 列表项

为用作列表项的元素添加`.item`类, 所有列表项都必须作为列表项组(`.items`)的直接子元素.

#### 单个列表项示例

```html
<div class="items">
  <div class="item">
    <div class="item-heading">
      <div class="pull-right label label-success">维基</div>
      <h4><a href="#">HTML5 发展历史</a></h4>
    </div>
    <div class="item-content">HTML 5草案的前身名为Web Applications 1.0，是在2004年由WHATWG提出。2008年1月22日，第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作，仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
    <div class="item-footer">
      <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a>
      <span class="text-muted">2013-11-11 16:14:37</span>
    </div>
  </div>
</div>
```

#### 包含缩略图

在`.item-content`内使用`.media`包裹图片作为缩略图.

在`.media`上使用`.pull-left`或`.pull-right`来让缩略图居左或居右放置. 此时默认情况下缩略图最大宽度为`150px`, 如果要更改缩略图大小, 你可以手动为缩略图应用样式.

```html
<div class="items">
  <div class="item">
    <div class="item-heading">
      <div class="pull-right label label-success">维基</div>
      <h4><a href="#">HTML5 发展历史</a></h4>
    </div>
    <div class="item-content">
      <div class="media pull-left"><img src="http://zui.sexy/docs/img/img2.jpg" alt="图片居左显示"></div>
      <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
    </div>
    <div class="item-footer">
      <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a>
      <span class="text-muted">2013-11-11 16:14:37</span>
    </div>
  </div>
  <div class="item">
    <div class="item-heading">
      <div class="pull-right label label-success">维基</div>
      <h4><a href="#">HTML5 发展历史</a></h4>
    </div>
    <div class="item-content">
      <div class="media pull-right"><img src="http://zui.sexy/docs/img/img2.jpg" alt="图片居右显示"></div>
      <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
    </div>
    <div class="item-footer">
      <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a>
      <span class="text-muted">2013-11-11 16:14:37</span>
    </div>
  </div>
  <div class="item">
    <div class="item-heading">
      <div class="pull-right label label-success">维基</div>
      <h4><a href="#">HTML5 发展历史</a></h4>
    </div>
    <div class="item-content">
      <div class="media"><img src="http://zui.sexy/docs/img/slide1.jpg" alt="图片居中显示"></div>
      <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
    </div>
    <div class="item-footer">
      <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a>
      <span class="text-muted">2013-11-11 16:14:37</span>
    </div>
  </div>
</div>
```

#### 鼠标悬停效果

为`.items`添加`.items-hover`类可以为列表项添加鼠标悬停效果.

```html
<div class="items items-hover">
  <div class="item">
    <div class="item-heading">
      <div class="pull-right label label-success">维基</div>
      <h4><a href="#">HTML5 发展历史</a></h4>
    </div>
    <div class="item-content">
      <div class="media pull-right"><img src="http://zui.sexy/docs/img/img2.jpg" alt="图片居右显示"></div>
      <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
    </div>
    <div class="item-footer">
      <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a>
      <span class="text-muted">2013-11-11 16:14:37</span>
    </div>
  </div>
</div>
```


### 综合示例

```html
<div class="list">
  <header>
    <h3><i class="icon-list-ul"></i> 最新动态 <small>更新 123 条</small></h3>
  </header>
  <div class="items items-hover">
    <div class="item">
      <div class="item-heading">
        <div class="pull-right"><span class="text-muted">2013-11-11 16:14:37</span> &nbsp; <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a></div>
        <h4><a href="#">HTML5 发展历史</a></h4>
      </div>
      <div class="item-content">
        <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
      </div>
    </div>
    <div class="item">
      <div class="item-heading">
        <div class="pull-right label label-success">维基</div>
        <h4><a href="#">HTML5 发展历史</a></h4>
      </div>
      <div class="item-content">
        <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
      </div>
      <div class="item-footer">
        <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a> &nbsp; <span class="text-muted">2013-11-11 16:14:37</span>
      </div>
    </div>
    <div class="item">
      <div class="item-heading">
        <div class="pull-right label label-success">维基</div>
        <h4><a href="#">HTML5 发展历史</a></h4>
      </div>
      <div class="item-content">
        <div class="media pull-right"><img src="http://zui.sexy/docs/img/img2.jpg" alt=""></div>
        <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
      </div>
      <div class="item-footer">
        <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a> &nbsp; <span class="text-muted">2013-11-11 16:14:37</span>
      </div>
    </div>
    <div class="item">
      <div class="item-heading">
        <div class="pull-right"><a href="#"><i class="icon-pencil"></i> 编辑</a> &nbsp;<a href="#"><i class="icon-remove"></i> 删除</a></div>
        <h4><span class="label label-success">维基</span> <a href="#">HTML5 发展历史</a></h4>
      </div>
      <div class="item-content">
        <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
      </div>
      <div class="item-footer">
        <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a> &nbsp; <span class="text-muted">2013-11-11 16:14:37</span>
      </div>
    </div>
  </div>
  <footer>
    <ul class="pager">
      <li class="previous"><a href="#">« 上一页</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">⋯</a></li>
      <li><a href="#">6</a></li>
      <li class="active"><a href="#">7</a></li>
      <li><a href="#">8</a></li>
      <li><a href="#">9</a></li>
      <li><a href="#">⋯</a></li>
      <li><a href="#">12</a></li>
      <li class="next"><a href="#">下一页 »</a></li>
    </ul>
  </footer>
</div>
```


### 更紧凑的列表

通过为`.list`添加`list-condensed`类来获得更加紧凑的列表视图, 适合放置在没有内边距的容器内.

```html
<div class="list list-condensed">
  <header>
    <h3><i class="icon-list-ul"></i> 最新动态 <small>更新 123 条</small></h3>
  </header>
  <div class="items items-hover">
    <div class="item">
      <div class="item-heading">
        <div class="pull-right"><span class="text-muted">2013-11-11 16:14:37</span> &nbsp; <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a></div>
        <h4><a href="#">HTML5 发展历史</a></h4>
      </div>
      <div class="item-content">
        <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
      </div>
    </div>
    <div class="item">
      <div class="item-heading">
        <div class="pull-right label label-success">维基</div>
        <h4><a href="#">HTML5 发展历史</a></h4>
      </div>
      <div class="item-content">
        <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
      </div>
      <div class="item-footer">
        <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a>
        <span class="text-muted">2013-11-11 16:14:37</span>
      </div>
    </div>
    <div class="item">
      <div class="item-heading">
        <div class="pull-right label label-success">维基</div>
        <h4><a href="#">HTML5 发展历史</a></h4>
      </div>
      <div class="item-content">
        <div class="media pull-right"><img src="http://zui.sexy/docs/img/img2.jpg" alt=""></div>
        <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
      </div>
      <div class="item-footer">
        <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a>
        <span class="text-muted">2013-11-11 16:14:37</span>
      </div>
    </div>
    <div class="item">
      <div class="item-heading">
        <div class="pull-right"><a href="#"><i class="icon-pencil"></i> 编辑</a> &nbsp;<a href="#"><i class="icon-remove"></i> 删除</a></div>
        <h4><span class="label label-success">维基</span> <a href="#">HTML5 发展历史</a></h4>
      </div>
      <div class="item-content">
        <div class="text">HTML 5草案的前身名为Web Applications 1.0, 是在2004年由WHATWG提出。2008年1月22日, 第一份正式草案发布。WHATWG表示该规范是目前仍在进行的工作, 仍须多年的努力。[8]目前Mozilla Firefox、Google Chrome、Opera、Safari（版本4以上）、Internet Explorer（版本9以上）已支持HTML5技术。</div>
      </div>
      <div class="item-footer">
        <a href="#" class="text-muted"><i class="icon-comments"></i> 243</a>
        <span class="text-muted">2013-11-11 16:14:37</span>
      </div>
    </div>
  </div>
  <footer>
    <ul class="pager">
      <li class="previous"><a href="#">« 上一页</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">⋯</a></li>
      <li><a href="#">6</a></li>
      <li class="active"><a href="#">7</a></li>
      <li><a href="#">8</a></li>
      <li><a href="#">9</a></li>
      <li><a href="#">⋯</a></li>
      <li><a href="#">12</a></li>
      <li class="next"><a href="#">下一页 »</a></li>
    </ul>
  </footer>
</div>
```

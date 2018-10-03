# [视图 - 卡片](http://zui.sexy/#view/card)

卡片视图使用网格(栅格)来集中展示一组卡片.

### css类样式列表
 - [`.cards`](#结构): 卡片视图的父级容器, 具备栅格中的`.row`的行为, 可以嵌套`.col-*`来以栅格创建卡片排列布局;
 - [`.cards .card`](#结构): 卡片视图的容器, 可单独使用, 不需要包含在`.cards`容器元素中;
 - [`.card > img`](#仅图片); 卡片视图中的图片;
 - [`.card > .media-wrapper > img`](#使用media-wrapper容器); 卡片视图中的图片;
 - [`.card > .card-heading`](#标题与文字); 卡片视图中的标题容器;
 - [`.card > .card-content`](#标题与文字); 卡片视图中的文本内容容器;
 - [`.card > .card-actions`](#包含按钮); 卡片视图中的操作按钮容器;
 - [`.card > .caption`](#覆盖文本); 在卡片上方出现的覆盖文本(仅卡片上方部分). 光标悬停在卡片上时滑动展现, 光标离开卡片时隐藏;
 - [`.card > .card-reveal`](#文本遮罩图片); 在卡片上方出现的遮罩文本(整个卡片). 光标悬停在卡片上时向上滑动展现, 光标离开卡片时乡下滑动隐藏;
 - [`.cards.cards-borderless`](#无边框视图): 无边框视图;
 - [`.cards.cards-condensed`](#紧凑视图): 紧凑视图;


### 结构

卡片视图使用`.cards`类作为父级容器. 因为`.cards`实际上具备栅格中的`.row`的行为, 所有可以直接在`.cards`内包含`.col-*`来以栅格创建卡片排列布局.

卡片`.card`也可以单独使用, 而不需要包含在`.cards`容器元素中.

通常卡片视图的 HTML 结构如下:

```html
<div class="cards">
  <div class="col-md-4">
    <div class="card">
      <img src="http://zui.sexy/docs/img/img4.jpg" alt="">
    </div>
  </div>
  <!-- ... 更多的 .col-md-4 来包含卡片 -->
</div>
```

#### 提示: 为了方便用户创建多种尺寸的卡片, 并没有限定卡片的高度, 但为保证卡片视图排列正常, 需要确保每个卡片的高度一致.</h4>


### 卡片内容类型

#### 仅图片

```html
<div class="card">
  <img src="http://zui.sexy/docs/img/img3.jpg" alt="">
</div>
```

#### 链接

如果在`<a>`元素上添加`.card`类则得到一个可以点击的卡片.

```html
<a class="card" href="#">
  <img src="http://zui.sexy/docs/img/img1.jpg" alt="">
</a>
```

#### 使用`.media-wrapper`容器

为图片增加 .media-wrapper 容器, 用来为图标固定尺寸和设置特殊效果.

```html
<a class="card" href="#">
  <div class="media-wrapper">
    <img src="http://zui.sexy/docs/img/img2.jpg" alt="">
  </div>
  <div class="caption">“良辰美景” 出自《牡丹亭》</div>
  <div class="card-heading"><strong>良辰美景</strong></div>
  <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
</a>
```

#### 标题与文字

```html
<a class="card" href="#">
  <img src="http://zui.sexy/docs/img/img2.jpg" alt="">
  <div class="card-heading"><strong>良辰美景</strong></div>
  <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
</a>
```

#### 包含按钮

```html
<a class="card" href="#">
  <img src="http://zui.sexy/docs/img/img2.jpg" alt="">
  <div class="card-heading"><strong>良辰美景</strong></div>
  <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
  <div class="card-actions">
    <button type="button" class="btn btn-danger"><i class="icon-heart"></i> 喜欢</button>
    <div class="pull-right text-danger"><i class="icon-heart-empty"></i> 520 人喜欢</div>
  </div>
</a>
```

#### 包含标签

```html
<a class="card" href="#">
  <img src="http://zui.sexy/docs/img/img2.jpg" alt="">
  <div class="card-heading"><strong>良辰美景</strong></div>
  <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
  <div class="card-actions">
    <span class="label label-warning">牡丹亭</span>
    <div class="pull-right"><i class="icon-comments-alt"></i> 520</div>
  </div>
</a>
```

#### 覆盖文本

可以在`.card`内包含一个`.caption`用来展示覆盖文本. 覆盖文本将在光标悬停在卡片上时滑动展现, 光标离开卡片时隐藏.

```html
<a class="card" href="#">
  <img src="http://zui.sexy/docs/img/img2.jpg" alt="">
  <div class="caption">“良辰美景” 出自《牡丹亭》</div>
  <div class="card-heading"><strong>良辰美景</strong></div>
  <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
</a>
```

#### 文本遮罩图片

将`.card-heading`和`.card-content`放到`.card-reveal`中, 光标悬停在卡片上时文本向上遮罩覆盖图片, 光标离开显示图片.

```html
<a class="card" href="#">
  <img src="http://zui.sexy/docs/img/img2.jpg" alt="">
  <div class="card-reveal">
    <div class="card-heading"><strong>良辰美景</strong></div>
    <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
  </div>
</a>
```


### 简单示例

```html
<div class="cards">
  <div class="col-md-4 col-sm-6 col-lg-3">
    <div class="card"><img src="http://zui.sexy/docs/img/img1.jpg" alt=""></div>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <div class="card"><img src="http://zui.sexy/docs/img/img2.jpg" alt=""></div>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <div class="card"><img src="http://zui.sexy/docs/img/img3.jpg" alt=""></div>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <div class="card"><img src="http://zui.sexy/docs/img/img4.jpg" alt=""></div>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <div class="card"><img src="http://zui.sexy/docs/img/img5.jpg" alt=""></div>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <div class="card"><img src="http://zui.sexy/docs/img/img1.jpg" alt=""></div>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <div class="card"><img src="http://zui.sexy/docs/img/img2.jpg" alt=""></div>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <div class="card"><img src="http://zui.sexy/docs/img/img3.jpg" alt=""></div>
  </div>
</div>
```


### 无边框视图

为`.cards`添加`.cards-borderless`类来移除卡片的边框.

```html
<div class="cards cards-borderless">
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img2.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img1.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img5.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img4.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img3.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img2.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img1.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img5.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
</div>
```


### 紧凑视图

为`.cards`添加`.cards-condensed`类可以得到更为紧凑的视图, 卡片之间将没有间距.

```html
<div class="cards cards-condensed">
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img2.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img1.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img5.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img4.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img3.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img2.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img1.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
  <div class="col-md-4 col-sm-6 col-lg-3">
    <a class="card" href="#">
      <img src="http://zui.sexy/docs/img/img5.jpg" alt="">
      <div class="caption">“良辰美景” 出自《牡丹亭》</div>
      <div class="card-heading"><strong>良辰美景</strong></div>
      <div class="card-content text-muted">良辰美景奈何天, 赏心乐事谁家院。</div>
    </a>
  </div>
</div>
```

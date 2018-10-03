# [组件 - 代码 - 代码高亮](http://zui.sexy/#component/code/3)

### 代码高亮

代码高亮是通过根据代码语言语法给代码中的单词、字符标记为不同颜色来显示的方法. 代码高亮能大大提高代码的查阅体验. 在web界面加上代码高亮非常容易, 在产品中如需要向用户展现代码应该使用代码高亮. 

这里推荐的方案是 [Google Code Prettify](https://github.com/google/code-prettify) 实现代码高亮. Google Code Prettify能够自动识别代码语言类型并正确应用语法高亮. 

下面是一个 php 文件的示例:
```php
echo Prettify::widget([
    'linenums' => true,
    'content' => '&lt;!doctype html&gt;
&lt;html lang="en"&gt;
  &lt;head&gt;
    &lt;title&gt;Zentao Design Guidelines&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
  &lt;?php
    echo "hello, world!";
  ?&gt;
  &lt;/body&gt;
&lt;/html&gt;'
]);
```
渲染结果:
```html
<pre class="prettyprint linenums">
<code>&lt;!doctype html&gt;
&lt;html lang="en"&gt;
  &lt;head&gt;
    &lt;title&gt;Zentao Design Guidelines&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
  &lt;?php
    echo "hello, world!";
  ?&gt;
  &lt;/body&gt;
&lt;/html&gt;</code>
</pre>
```

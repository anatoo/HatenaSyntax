<?php
include_once dirname(__FILE__) . '/../vendor/autoload.php';
//include_once dirname(__FILE__) . '/../lib/HatenaSyntax.php';


$str = '*header1
[:contents]

[http://google.com:title]

**header2

:definition term:definition description
::description2

-list1
++fuga2
++hoge3
---list4
---list5
-list6

paragraph((footnote))
[[keywordlink]]
[][[nulllink]][]

|*table header |*table header2 |
|apple         |1              |
|orange        |2              |

>|
hoge

fuga|<

[http://example.com/example.gif:image]

>>
***blockquote header
fuga
<<

>|php|
<?php
echo "hogehoge";||<

[http://google.com]

';

function spreHandler($type, Array $lines)
{
    foreach ($lines as &$line) $line = htmlspecialchars($line, ENT_QUOTES, 'utf-8');
    $body = join(PHP_EOL, $lines);
    return '<pre class="superpre ' . htmlspecialchars($type, ENT_QUOTES, 'utf-8') 
           . '">' . PHP_EOL . $body . '</pre>';
}

function keywordLinkHandler($path)
{
    return './' . $path;
}

function linkTitleHandler($url) 
{
    return $url;
}

// オプションは全て省略可。第二引数自体も省略可。
echo HatenaSyntax::render($str, array(

    // ヘッダの基準値。デフォルトは1
    'headerlevel' => 3,                           

    // 記事の識別子。指定しない場合はランダムなIDが生成される
    'id' => 'hoge',                               

    // htmlをエスケープするか。デフォルトはtrue。
    'htmlescape' => false,                        

    // 記事本体を囲むdiv要素のクラス。デフォルトは'section'
    'sectionclass' => 'section',                  

    // 脚注を囲むdiv要素のクラス。デフォルトは'footnote'
    'footnoteclass' => 'footnote',                

    // キーワード記法のキーワードをアドレスに処理するコールバック
    'keywordlinkhanlder' => 'keywordLinkHandler', 

    // superpre記法の中身を処理するコールバック
    'superprehandler' => 'spreHandler',

    // [http://~~:title]のリンクを処理するコールバック
    'linktitlehandler' => 'linkTitleHandler'
));         

/* 結果
<div class="section">
<h3>header1<a name="ea703e7aa1efda0064eaa507d9e8ab7e_header_0" id="ea703e7aa1efda0064eaa507d9e8ab7e_header_0"></a></h3>
<div class="toc"><ol>
<li>
<a href="#ea703e7aa1efda0064eaa507d9e8ab7e_header_0">header1</a>
<ol>
<li>
<a href="#ea703e7aa1efda0064eaa507d9e8ab7e_header_1">header2</a>
<ol>
<li><a href="#ea703e7aa1efda0064eaa507d9e8ab7e_header_2">blockquote header</a></li>
</ol>
</li>
</ol>
</li>
</ol>
</div>

<p><a href="http://google.com">http://google.com</a></p>

<h4>header2<a name="ea703e7aa1efda0064eaa507d9e8ab7e_header_1" id="ea703e7aa1efda0064eaa507d9e8ab7e_header_1"></a></h4>

<dl>
<dt>definition term</dt>
<dd>definition description</dd>
<dd>description2</dd>
</dl>

<ul>
<li>
list1
<ol>
<li>fuga2</li>
<li>
hoge3
<ul>
<li>list4</li>
<li>list5</li>
</ul>
</li>
</ol>
</li>
<li>list6</li>
</ul>


<p>paragraph(<a href="#ea703e7aa1efda0064eaa507d9e8ab7e_footnote_1" name="ea703e7aa1efda0064eaa507d9e8ab7e_footnotelink_1" id="ea703e7aa1efda0064eaa507d9e8ab7e_footnotelink_1" title="footnote">*1</a>)</p>
<p><a href="./keywordlink">keywordlink</a></p>
<p>[[nulllink]]</p>

<table>
<tr>
<th>table header </th>
<th>table header2 </th>
</tr>
<tr>
<td>apple         </td>
<td>1              </td>
</tr>
<tr>
<td>orange        </td>
<td>2              </td>
</tr>
</table>

<pre>
hoge

fuga</pre>

<p><a href="http://example.com/example.gif"><img src="http://example.com/example.gif" /></a></p>

<blockquote>
<h5>blockquote header<a name="ea703e7aa1efda0064eaa507d9e8ab7e_header_2" id="ea703e7aa1efda0064eaa507d9e8ab7e_header_2"></a></h5>
<p>fuga</p>
</blockquote>

<pre class="superpre php">
&lt;?php
echo &quot;hogehoge&quot;;</pre>

<p><a href="http://google.com"></a></p>

</div>


<div class="footnote">
<p><a href="#ea703e7aa1efda0064eaa507d9e8ab7e_footnotelink_1" name="ea703e7aa1efda0064eaa507d9e8ab7e_footnote_1" id="ea703e7aa1efda0064eaa507d9e8ab7e_footnote_1">*1</a>: footnote</p>
</div>
*/

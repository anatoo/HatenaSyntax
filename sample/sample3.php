<?php
include_once dirname(__FILE__) . '/../lib/HatenaSyntax.php';

$text = <<<EOS
*s1* hoge
a

*s2* fuga
b

*s3* piyo
c

EOS;

$nodes = HatenaSyntax::parseAsSections($text);

foreach ($nodes as $node) {
	$name = HatenaSyntax::getSectionName($node);
	echo "<!--{$name}-->\n";
	echo HatenaSyntax::renderNode($node);
	echo "\n";
}

/* 結果

<!--s1-->
<div class="section">
<h1> hoge<a name="0a5f00d24e95fc67f4933ba9d374a09f_header_0" id="0a5f00d24e95fc67f4933ba9d374a09f_header_0"></a></h1>
<p>a</p>

</div>

<!--s2-->
<div class="section">
<h1> fuga<a name="685dfe890c0b3e6cb12683009061a63d_header_0" id="685dfe890c0b3e6cb12683009061a63d_header_0"></a></h1>
<p>b</p>

</div>

<!--s3-->
<div class="section">
<h1> piyo<a name="d510334f8a5d7d6144e323f5f90553c0_header_0" id="d510334f8a5d7d6144e323f5f90553c0_header_0"></a></h1>
<p>c</p>

</div>

 */

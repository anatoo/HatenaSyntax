<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;

$remover = new HatenaSyntax_CommentRemover;

$text = ">|php|\n<!-- -->||<";
$t->is($remover->remove($text), $text);

$text = "<!--\n>||\nhogehoge||<\n-->";
$t->is($remover->remove($text), '');

$text = <<<EOS
<!-- hoge -->
>|xml|
<!--comment-->||<
<!--
>||

||<
-->
EOS;
$expected = <<<EOS

>|xml|
<!--comment-->||<

EOS;
$t->is($remover->remove($text), $expected);

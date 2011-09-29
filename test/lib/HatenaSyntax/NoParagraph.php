<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;
$p = new HatenaSyntax_NoParagraph(PEG::anything());

$c = PEG::context(array('><p>a</p><'));
$t->is($p->parse($c), array('p', array(), array('a')));

$c = PEG::context(array(
    '><p class="hoge">',
    'fuga',
    '</p><'
));
$t->is($p->parse($c), array('p', array('class' => 'hoge'), array('f', 'u', 'g', 'a')));

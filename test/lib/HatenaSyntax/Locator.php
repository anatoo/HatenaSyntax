<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;

$p = HatenaSyntax_Locator::it()->bracket;

$c = PEG::context('[http://google.com:title=hoge]');

$t->ok($p->parse($c));

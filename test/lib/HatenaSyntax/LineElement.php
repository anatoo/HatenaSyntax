<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;

$p = HatenaSyntax_Locator::it()->lineElement;

$c = PEG::context('a');

$t->is($p->parse($c), 'a');

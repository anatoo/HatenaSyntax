<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;

$p = new HatenaSyntax_List(PEG::anything());
$c = PEG::context(array(
    '+a', '+c'
));

$t->ok($p->parse($c) !== PEG::failure());

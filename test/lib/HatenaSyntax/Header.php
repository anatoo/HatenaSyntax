<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;

$p = new HatenaSyntax_Header(PEG::anything());
$c = PEG::context(array('*abc'));

$t->is($p->parse($c), array(0, false, array('a', 'b', 'c')));

$c = PEG::context(array('*name*a'));

$t->is($p->parse($c), array(0, 'name', array('a')));

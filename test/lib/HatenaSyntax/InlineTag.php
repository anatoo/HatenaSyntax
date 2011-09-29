<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;

$p = new HatenaSyntax_InlineTag(PEG::anything());

$c = PEG::context('<strong>a</strong>');

$t->is($p->parse($c), array('strong', array('a')));

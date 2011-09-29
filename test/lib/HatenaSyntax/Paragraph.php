<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;

$p = new HatenaSyntax_Paragraph(PEG::anything());
$c = PEG::context(array(
    'abc',
    'def'
));

$t->is(
    $p->parse($c),
    array('a', 'b', 'c')
);

$t->is(
    $p->parse($c),
    array('d', 'e', 'f')
);

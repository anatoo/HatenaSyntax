<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;

$p = new HatenaSyntax_SuperPre;
$c = PEG::context(array(
    '>||',
    'a||<'
));

$t->is(
    $p->parse($c),
    array('', array('a'))
);

$c = PEG::context(array(
    '>|a|',
    'b',
    '||<'
));

$t->is(
    $p->parse($c),
    array('a', array('b'))
);

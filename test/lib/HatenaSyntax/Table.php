<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;

$p = new HatenaSyntax_Table(PEG::anything());

$c = PEG::context(array(
    '|*a|*b|',
    '|c|d|'
));

$t->is(
    $p->parse($c),
    array(
        array(array('*', array('a')), array('*', array('b'))),
        array(array(false, array('c')), array(false, array('d')))
    )
);

$c = PEG::context(array(
    '|a|'
));

$t->is(
    $p->parse($c),
    array(
        array(array(false, array('a')))
    )
);


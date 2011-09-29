<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;

$p = new HatenaSyntax_DefinitionList(PEG::anything());
$c = PEG::context(array(
    ':a:b', ':a:b'
));

$t->is(
    $p->parse($c),
    array(
        array(array('a'), array('b')),
        array(array('a'), array('b'))
    ));

<?php
include_once dirname(__FILE__) . '/../../t.php';

$t = new lime_test;

$p = new HatenaSyntax_Quote(PEG::anything());
$c = PEG::context(array(
    '>>',
    'a',
    '<<'
));

$t->is(
    $p->parse($c),
    array(
        false,
        array('a')
    ));


$c = PEG::context(array(
    '>http://google.com>',
    'a',
    '<<'
));

$result = $p->parse($c);
$t->is($result[1], array('a'));
$t->is($result[0]->at('href'), 'http://google.com');
$t->is($result[0]->at('title'), false);


$c = PEG::context(array(
    '>http://google.com:title>',
    'a',
    '<<'
));

$result = $p->parse($c);
$t->is($result[1], array('a'));
$t->is($result[0]->at('href'), 'http://google.com');
$t->is($result[0]->at('title'), '');


$c = PEG::context(array(
    '>http://google.com:title=hoge>',
    'a',
    '<<'
));

$result = $p->parse($c);
$t->is($result[1], array('a'));
$t->is($result[0]->at('href'), 'http://google.com');
$t->is($result[0]->at('title'), 'hoge');

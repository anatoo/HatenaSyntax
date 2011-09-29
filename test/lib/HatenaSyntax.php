<?php
include_once dirname(__FILE__) . '/../t.php';

$t = new lime_test;
$hs = new HatenaSyntax;

$node = $hs->parse('*hoge*header');
$t->is($hs->getSectionName($node), 'hoge');

$node = $hs->parse('*hoge');
$t->is($hs->getSectionName($node), '');

$node = $hs->parse('**hoge*header');
$t->is($hs->getSectionName($node), '');

$node = $hs->parse('');
$t->pass();

$nodes = $hs->parseAsSections("\n*hoge\n*fuga\n*piyo");
$t->is(count($nodes), 3);

$nodes = $hs->parseAsSections("*hoge\n\nfuga");
$t->is(count($nodes), 1);

$title = $hs->getSectionTitle($hs->parse('*hahaha'));
$t->is($title, 'hahaha');

$title = $hs->getSectionTitle($hs->parse('*hoge*s[http://google.com]'));
$t->is($title, 'shttp://google.com');

$hasTopHeader = $hs->hasTopHeader($hs->parse('*hoge'));
$t->ok($hasTopHeader);

$hasTopHeader = $hs->hasTopHeader($hs->parse('hoge'));
$t->ok(!$hasTopHeader);

$hasSeparator = $hs->hasSeparator($hs->parse('* fuga'));
$t->ok(!$hasSeparator);

$hasSeparator = $hs->hasSeparator($hs->parse("* hoge\n====\nhahaha"));
$t->ok($hasSeparator);

$node = $hs->separate($hs->parse("* hoge\n====\nhahaha"));
$t->is(count($node->getData()), 2);

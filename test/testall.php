<?php
include_once dirname(__FILE__) . '/t.php';

$lime = new lime_harness(null);
$lime->register_glob(dirname(__FILE__) . '/lib/*.php');
$lime->register_glob(dirname(__FILE__) . '/lib/HatenaSyntax/*.php');
$lime->run();

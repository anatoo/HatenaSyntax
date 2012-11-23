HatenaSyntax
====

はてな記法パーサ。

Install
----

[composer](http://getcomposer.org/)を使ってインストール。

    $ mkdir foobar && cd foobar
    $ echo '{"require": {"hatenasyntax/hatenasyntax": "*"}}' >  composer.json
    $ composer install

オートローディングのために、"vendor/autoload.php"をincludeする。

    <?php
    include_once __DIR__ . '/vendor/autoload.php';

How to run tests and examples
----

git-cloneした後、setup.shを走らせる。

    $ git clone https://github.com/anatoo/HatenaSyntax.git
    $ cd HatenaSyntax
    $ ./setup.sh

全てのテストを実行する。

    $ php test/testall.php

例を動かす。

    $ php examples/example1.php


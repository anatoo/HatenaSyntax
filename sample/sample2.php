<?php
include_once dirname(__FILE__) . '/../lib/HatenaSyntax.php';

$str = '*hogehoge

fugafuga';

var_dump(HatenaSyntax::parse($str));
/*
object(HatenaSyntax_Node)#217 (2) {
  ["type":protected]=>
  string(4) "root"
  ["data":protected]=>
  array(3) {
    [0]=>
    object(HatenaSyntax_Node)#213 (2) {
      ["type":protected]=>
      string(6) "header"
      ["data":protected]=>
      array(2) {
        ["level"]=>
        int(0)
        ["body"]=>
        array(8) {
          [0]=>
          string(1) "h"
          [1]=>
          string(1) "o"
          [2]=>
          string(1) "g"
          [3]=>
          string(1) "e"
          [4]=>
          string(1) "h"
          [5]=>
          string(1) "o"
          [6]=>
          string(1) "g"
          [7]=>
          string(1) "e"
        }
      }
    }
    [1]=>
    object(HatenaSyntax_Node)#214 (2) {
      ["type":protected]=>
      string(14) "emptyparagraph"
      ["data":protected]=>
      string(0) ""
    }
    [2]=>
    object(HatenaSyntax_Node)#216 (2) {
      ["type":protected]=>
      string(9) "paragraph"
      ["data":protected]=>
      array(8) {
        [0]=>
        string(1) "f"
        [1]=>
        string(1) "u"
        [2]=>
        string(1) "g"
        [3]=>
        string(1) "a"
        [4]=>
        string(1) "f"
        [5]=>
        string(1) "u"
        [6]=>
        string(1) "g"
        [7]=>
        string(1) "a"
      }
    }
  }
}
*/

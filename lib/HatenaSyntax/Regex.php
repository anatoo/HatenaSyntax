<?php
/**
 * @package HatenaSyntax
 * @author KUBOTA Mitsunori <anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * 
 */

class HatenaSyntax_Regex implements PEG_IParser
{
    protected $regex;

    function __construct($regex)
    {
        $this->regex = $regex;
    }

    function parse(PEG_IContext $context)
    {
        $elt = $context->readElement();
        return preg_match($this->regex, $elt) ? $elt : PEG::failure();
    }
}

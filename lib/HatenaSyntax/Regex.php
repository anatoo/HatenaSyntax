<?php
/**
 * @package HatenaSyntax
 * @author anatoo<anatoo@nequal.jp>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @version $Id: Regex.php 1574 2010-01-25 08:28:15Z anatoo $
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

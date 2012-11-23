<?php
/**
 * @package HatenaSyntax
 * @author anatoo<anatoo@nequal.jp>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @version $Id: Leaf.php 1567 2010-01-23 10:05:46Z anatoo $
 */

include_once dirname(__FILE__) . '/INode.php';

class HatenaSyntax_Tree_Leaf implements HatenaSyntax_Tree_INode
{
    protected $value;
    
    function __construct($value)
    {
        $this->value = $value;
    }
    
    function hasValue()
    {
        return true;
    }
    
    function getValue()
    {
        return $this->value;
    }
    
    function hasChildren()
    {
        return false;
    }
    
    function getChildren()
    {
        return array();
    }
    
    function getType()
    {
        return 'leaf';
    }
}
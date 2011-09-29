<?php
/**
 * @package HatenaSyntax
 * @author anatoo<anatoo@nequal.jp>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @version $Id: Node.php 1567 2010-01-23 10:05:46Z anatoo $
 */

include_once dirname(__FILE__) . '/INode.php';

class HatenaSyntax_Tree_Node implements HatenaSyntax_Tree_INode
{
    protected $value, $children;
    
    function __construct(Array $children, $value = null)
    {
        list($this->children, $this->value) = array($children, $value);
    }
    
    function hasValue()
    {
        return isset($this->value);
    }
    
    function getValue()
    {
        return $this->value;
    }
    
    function hasChildren()
    {
        return true;
    }
    
    function getChildren()
    {
        return $this->children;
    }
    
    function getType()
    {
        return 'node';
    }
}
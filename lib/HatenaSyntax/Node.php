<?php
/**
 * @package HatenaSyntax
 * @author KUBOTA Mitsunori <anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * 
 */

class HatenaSyntax_Node
{
    protected $type, $offset, $data;
    function __construct($type, $data = array(), $offset = null)
    {
        $this->type = $type;
        $this->data = $data;
        $this->offset = $offset;
    }

    function getOffset()
    {
        return $this->offset;
    }
    
    function getType()
    {
        return $this->type;
    }
    
    function getData()
    {
        return $this->data;
    }

    function at($name, $defaultVal = null)
    {
        return array_key_exists($name, $this->data) 
            ? $this->data[$name] 
            : $defaultVal;
    }

    function isTopHeader()
    {
        return $this->type === 'header' && $this->at('level') === 0;
    }
}

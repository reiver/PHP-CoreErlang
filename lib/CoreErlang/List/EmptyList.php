<?php

namespace CoreErlang;

class EmptyList extends Progenitor implements ICompile, IConstant, IList, ILit, IExpression
{
    public function __construct(File $file, Module $module, Progenitor $progenitor = null)
    {
        parent::__construct($file, $module, $progenitor);
    }



    public function getValue()
    {
        return array();
    }
    public function setValue($value)
    {
        Exception::throwIfNotEquals(array(), $value);
    }



    public function getHead()
    {
        throw Exception('Undefined');
    }
    public function setHead($vhead)
    {
        throw Exception('Undefined');

        return $this;
    }



    public function getTail()
    {
        throw Exception('Undefined');
    }
    public function setTail($tail)
    {
        throw Exception('Undefined');

        return $this;
    }



    public function compile($fd, $indentation_level = 0)
    {
        fwrite($fd, '[]');
    }
}


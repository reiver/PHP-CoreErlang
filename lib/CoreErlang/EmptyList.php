<?php

namespace CoreErlang;

class EmptyList extends Progenitor implements ICompile, IConstant, ILit
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

        return $this;
    }



    public function compile($fd, $indentation_level = 0)
    {
        fwrite($fd, '[]');
    }
}


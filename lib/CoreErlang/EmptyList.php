<?php

namespace CoreErlang;

class EmptyList extends Progenitor implements ICompile, ILit
{
    public function __construct(File $file, Module $module, Progenitor $progenitor = null)
    {
        parent::__construct($file, $module, $progenitor);
    }



    public function getValue()
    {
        return array();
    }
    public function setValue($x)
    {
        Exception::throwIfNotEquals(array(), $x);

        return $this;
    }



    public function compile($fd, $indentation_level = 0)
    {
        fwrite($fd, '[]');
    }
}


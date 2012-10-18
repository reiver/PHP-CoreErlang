<?php

namespace CoreErlang;

class Atom extends Progenitor implements ICompile, ILit
{
    private $value;



    public function __construct(File $file, Module $module, Progenitor $progenitor = null, $value)
    {
        parent::__construct($file, $module, $progenitor);

        Exception::throwIfIsNotString($value);

        $this->value = $value;
    }



    public function getValue()
    {
        return $this->value;
    }
    public function setValue($value)
    {
        Exception::throwIfIsNotString($value);

        $this->value = $value;

        return $this;
    }



    public function compile($fd, $indentation_level = 0)
    {
//@TODO: How do escape strings in Core Erlang???
        $s = '\''. (string)$this->value .'\'';
        fwrite($fd, $s);
    }
}


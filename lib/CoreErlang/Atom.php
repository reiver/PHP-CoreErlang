<?php

namespace CoreErlang;

class Atom extends Progenitor implements ICompile
{
    private $value;



    public function __construct(File $file, Module $module, Progenitor $progenitor = null, $value)
    {
        parent::__construct($file, $module, $progenitor);

        Exception::throwIfIsNotSting($value);

        $this->value = $value;
    }



    public function getValue()
    {
        return $this->value;
    }
    public function setValue($x)
    {
        $this->value = $x;

        return $this;
    }



    public function compile($fd, $indentation_level = 0)
    {
//@TODO: How do escape strings in Core Erlang???
        $s = '\''. (string)$this->value .'\'';
        fwrite($fd, $s);
    }
}


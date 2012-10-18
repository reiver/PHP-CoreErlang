<?php

namespace CoreErlang;

class Char extends Progenitor implements ICompile
{
    private $value;



    public function __construct(File $file, Module $module, Progenitor $progenitor = null, $value)
    {
        parent::__construct($file, $module, $progenitor);

        Exception::throwIfIsNotChar($value);

        $this->value  = $value;
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
//@TODO: How do escape char in Core Erlang???
        $s = '\''. (string)$this->value .'\'';
        fwrite($fd, $s);
    }
}


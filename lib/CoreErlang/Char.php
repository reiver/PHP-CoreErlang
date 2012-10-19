<?php

namespace CoreErlang;

class Char extends Progenitor implements ICompile, IConstant, ILit
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
    public function setValue($value)
    {
        Exception::throwIfIsNotChar($value);

        $this->value = $value;

        return $this;
    }



    public function compile($fd, $indentation_level = 0)
    {
//@TODO: How do escape char in Core Erlang???
        $s = '\''. (string)$this->value .'\'';
        fwrite($fd, $s);
    }
}


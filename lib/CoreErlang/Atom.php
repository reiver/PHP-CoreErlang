<?php

namespace CoreErlang;

class Atom extends Progenitor implements ICompile
{
    private $value;



    public function __construct(File $file, Module $module, $value)
    {
        parent::__construct($file, $module);

        $this->value  = $value;
    }



    public function compile($fd, $indentation_level = 0)
    {
//@TODO: How do escape strings in Core Erlang???
        $s = '\''. (string)$this->value .'\'';
        fwrite($fd, $s);
    }
}


<?php

namespace CoreErlang;

class Float extends Progenitor implements ICompile, ILit
{
    private $value;



    public function __construct(File $file, Module $module, Progenitor $progenitor = null, $value)
    {
        parent::__construct($file, $module, $progenitor);

        Exception::throwIfIsNotFloat($value);

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
        $s = (string)$this->value; // This needs to be converted to string. Want text version of number, not binary version.
        fwrite($fd, $s);
    }
}


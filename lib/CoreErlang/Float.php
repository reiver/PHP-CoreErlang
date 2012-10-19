<?php

namespace CoreErlang;

class Float extends Progenitor implements ICompile, IConstant, ILit
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
    public function setValue($value)
    {
        Exception::throwIfIsNotFloat($value);

        $this->value = $value;

        return $this;
    }



    public function compile($fd, $indentation_level = 0)
    {
        $s = (string)$this->value; // This needs to be converted to string. Want text version of number, not binary version.
        fwrite($fd, $s);
    }
}


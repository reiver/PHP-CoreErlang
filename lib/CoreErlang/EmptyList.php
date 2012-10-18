<?php

namespace CoreErlang;

class EmptyList extends Progenitor implements ICompile
{
    public function __construct(File $file, Module $module, Progenitor $progenitor = null)
    {
        parent::__construct($file, $module, $progenitor);
    }



    public function compile($fd, $indentation_level = 0)
    {
        fwrite($fd, '[]');
    }
}


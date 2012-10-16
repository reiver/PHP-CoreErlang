<?php

namespace CoreErlang;

class File
{
    private $module;

    private $name;
    private $indentation = "\t";



    public function __construct($name)
    {
        $this->name = $name;
    }



    public function getName()
    {
        return $this->name;
    }
    public function setName($x)
    {
        $this->name = $x;

        return $this;
    }



    public function getIndentation()
    {
        return $this->indentation;
    }
    public function setIndentation($x)
    {
        $this->indentation = $x;

        return $this;
    }



    public function module()
    {
        $this->module = new Module($this, $this->name);

        return $this->module;
    }



    public function compileToCoreFile()
    {
        $file_name = $this->name .'.core';
        $fd = fopen($file_name, 'w');

        Exception::throwIfEquals(false, $fd);

        $this->module->compile($fd);
    }



    public function indentation($n=1)
    {
        return str_repeat($this->indentation, $n);
    }
}


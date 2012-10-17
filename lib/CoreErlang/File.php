<?php

namespace CoreErlang;

class File
{
    private $module;

    private $name;
    private $base_path = '';
    private $indentation = "\t";



    public function __construct($name)
    {
        $this->name = $name;

        $this->module = new Module($this, $this->name);
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



    public function getBasePath()
    {
        return $this->base_path;
    }
    public function setBasePath($x)
    {
        $this->base_path = $x;

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



    public function getPath()
    {
        $file_name = $this->name .'.core';

        if (  is_null($this->base_path) || '' == $this->base_path  ) {
            $path = $file_name;
        } else {
            $path = $this->base_path .'/'.  $file_name;
        }

        return $path;
    }



    public function module()
    {
        return $this->module;
    }



    public function compileToCoreFile()
    {
        Exception::throwIfNotInstanceOf('CoreErlang\Module', $this->module, 'CoreErlang\File object must have a module before it can be compiled to a .core file.');

        $path = $this->getPath();
        $fd = fopen($path, 'w');

        Exception::throwIfEquals(false, $fd);

        $this->module->compile($fd);
    }



    public function indentation($n=1)
    {
        return str_repeat($this->indentation, $n);
    }
}


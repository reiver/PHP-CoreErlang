<?php

namespace CoreErlang;

abstract class Progenitor extends GrandProgenitor
{
    protected $module;
    protected $progenitor;

    public function __construct(File $file, Module $module, Progenitor $progenitor = null)
    {
        parent::__construct($file);

        $this->module     = $module;
        $this->progenitor = $progenitor;
    }

    public function moduleEnd()
    {
        return $this->module;
    }

    public function end()
    {
        return $this->progenitor;
    }
}

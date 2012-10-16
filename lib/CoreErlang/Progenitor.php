<?php

namespace CoreErlang;

abstract class Progenitor extends GrandProgenitor
{
    protected $module;
    protected $progenitor;

    public function moduleEnd()
    {
        return $this->module;
    }

    public function end()
    {
        return $this->progenitor;
    }
}

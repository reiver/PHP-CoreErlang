<?php

namespace CoreErlang;

abstract class GrandProgenitor
{
    protected $file;

    public function __construct(File $file)
    {
        $this->file = file;
    }

    public function fileEnd()
    {
        return $this->file;
    }
}

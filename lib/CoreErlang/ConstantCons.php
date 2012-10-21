<?php

namespace CoreErlang;

class ConstantCons extends Progenitor implements ICompile, IConstant, IList
{
    private $head;
    private $tail;


    public function __construct(File $file, Module $module, Progenitor $progenitor = null, IConstant $head, IConstant $tail)
    {
        parent::__construct($file, $module, $progenitor);

        Exception::throwIfNotInstanceOf('CoreErlang\IConstant', $tail);
        Exception::throwIfNotInstanceOf('CoreErlang\IConstant', $head);

        $this->head = $head;
        $this->tail = $tail;
    }



    public function getHead()
    {
        return $this->head;
    }
    public function setHead($vhead)
    {
        Exception::throwIfNotInstanceOf('CoreErlang\IConstant', $head);

        $this->head = $head;

        return $this;
    }



    public function getTail()
    {
        return $this->tail;
    }
    public function setTail($tail)
    {
        Exception::throwIfNotInstanceOf('CoreErlang\IConstant', $tail);

        $this->tail = $tail;

        return $this;
    }



    public function compile($fd, $indentation_level = 0)
    {
        fwrite($fd, '[');
        $this->head->compile($fd);
        fwrite($fd, '|');
        $this->tail->compile($fd);
        fwrite($fd, ']');
    }
}


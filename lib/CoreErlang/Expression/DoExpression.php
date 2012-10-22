<?php

namespace CoreErlang;

class DoExpression extends Progenitor implements ICompile, IExpression
{
    private $expression_1;
    private $expression_2;


    public function __construct(File $file, Module $module, Progenitor $progenitor = null, IExpression $expression_1, IExpression $expression_2)
    {
        parent::__construct($file, $module, $progenitor);

        Exception::throwIfNotInstanceOf('CoreErlang\IExpression', $expression_1);
        Exception::throwIfNotInstanceOf('CoreErlang\IExpression', $expression_2);

        $this->expression_1 = $expression_1;
        $this->expression_2 = $expression_2;
    }



    public function getExpression1()
    {
        return $this->expression_1;
    }
    public function setExpression1($expression_1)
    {
        Exception::throwIfNotInstanceOf('CoreErlang\IExpression', $expression_1);

        $this->expression_1 = $expression_1;

        return $this;
    }



    public function getExpression2()
    {
        return $this->expression_2;
    }
    public function setExpression2($expression_2)
    {
        Exception::throwIfNotInstanceOf('CoreErlang\IExpression', $expression_2);

        $this->expression_2 = $expression_2;

        return $this;
    }



    public function compile($fd, $indentation_level = 0)
    {
        fwrite($fd, 'do ');
        $this->expression_1->compile($fd);
        fwrite($fd, ' ');
        $this->expression_2->compile($fd);
    }
}


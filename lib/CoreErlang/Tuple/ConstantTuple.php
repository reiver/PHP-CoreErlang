<?php

namespace CoreErlang;

class ConstantTuple extends Progenitor implements ICompile, IConstant, ITuple
{
    private $arr;


    public function __construct(File $file, Module $module, Progenitor $progenitor = null)
    {
        parent::__construct($file, $module, $progenitor);

        $this->arr = array();
    }



    public function append($x)
    {
        if (  ! $x instanceof IConstant  ) {
            $x = CoreErlang::lit($this->file, $this->module, $this->progenitor, $x);
        }

        Exception::throwIfNotInstanceOf('CoreErlang\IConstant', $x);

        $this->arr[] = $x;
    }



    public function compile($fd, $indentation_level = 0)
    {
        fwrite($fd, '{');

        $first_iteration = true;
        if (  !empty($this->arr)  ) {
            foreach ($this->arr AS $x) {

                if (  ! $first_iteration  ) {
                    fwrite($fd, ', ');

                    $this->x->compile($fd);
                }

            } // foreach
        }

        fwrite($fd, '}');
    }
}

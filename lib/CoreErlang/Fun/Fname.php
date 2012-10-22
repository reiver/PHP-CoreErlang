<?php

namespace CoreErlang;

class Fname extends Progenitor implements ICompile, IExpression
{
    private $atom;
    private $integer;



    public function __construct(File $file, Module $module, Progenitor $progenitor = null, Atom $atom = null, Integer $integer = null)
    {
        parent::__construct($file, $module, $progenitor);

        if (  !is_null($atom)  ) {
            Exception::throwIfIsNotInstanceOf('CoreErlang\Atom',    $atom);
        }
        if (  !is_null($integer)  ) {
            Exception::throwIfIsNotInstanceOf('CoreErlang\Integer', $integer);
        }

        $this->atom    = $atom;
        $this->integer = $integer;
    }



    public function getAtom()
    {
        return $this->atom;
    }
    public function setAtom($atom)
    {
        if (  is_string($atom)  ) {
            $atom = new Atom($this->file, $this->module, $this, $atom);
        }

        Exception::throwIfIsNotInstanceOf('CoreErlang\Atom', $atom);

        $this->atom = $atom;

        return $this;
    }



    public function getInteger()
    {
        return $this->integer;
    }
    public function setInteger($integer)
    {
        if (  is_string($integer)  ) {
            $atom = new Integer($this->file, $this->module, $this, $integer);
        }

        Exception::throwIfIsNotInstanceOf('CoreErlang\Integer', $integer);

        $this->integer = $integer;

        return $this;
    }



    public function compile($fd, $indentation_level = 0)
    {
        $this->atom->compile($fd);
        fwrite($fd, '/');
        $this->integer->compile($fd);
    }
}


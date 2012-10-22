<?php

namespace CoreErlang;

class Lit extends Progenitor implements ICompile, IConstant, ILit, IExpression
{
    public static $LIT_CLASS_NAMES = array(
        'CoreErlang\Integer'     ,
        'CoreErlang\Float'       ,
        'CoreErlang\Atom'        ,
        'CoreErlang\Char'        ,
        'CoreErlang\String'      ,
        'CoreErlang\EmptyList'   ,
    );



    private $obj;



    public function __construct(File $file, Module $module, Progenitor $progenitor = null, $obj)
    {
        parent::__construct($file, $module, $progenitor);

        Exception::throwIfNotInstanceOfAny(self::$LIT_CLASS_NAMES, $obj);

        $this->obj  = $obj;
    }



    public function getValue()
    {
        return $this->obj->getValue();
    }
    public function setValue($x)
    {
        $this->obj->setValue($x);

        return $this;
    }



    public function getLitObj()
    {
        return $this->obj;
    }
    public function setLitObj($x)
    {
        $this->obj = $x;

        return $this;
    }



    public static function factoryInteger(File $file, Module $module, Progenitor $progenitor = null, $value)
    {
        $obj = new Integer($file, $module, $progenitor, $value);

        $lit = new Lit($file, $module, $progenitor, $obj);

        return $lit;
    }
    public static function factoryFloat(File $file, Module $module, Progenitor $progenitor = null, $value)
    {
        $obj = new Float($file, $module, $progenitor, $value);

        $lit = new Lit($file, $module, $progenitor, $obj);

        return $lit;
    }
    public static function factoryAtom(File $file, Module $module, Progenitor $progenitor = null, $value)
    {
        $obj = new Atom($file, $module, $progenitor, $value);

        $lit = new Lit($file, $module, $progenitor, $obj);

        return $lit;
    }
    public static function factoryChar(File $file, Module $module, Progenitor $progenitor = null, $value)
    {
        $obj = new Char($file, $module, $progenitor, $value);

        $lit = new Lit($file, $module, $progenitor, $obj);

        return $lit;
    }
    public static function factoryString(File $file, Module $module, Progenitor $progenitor = null, $value)
    {
        $obj = new String($file, $module, $progenitor, $value);

        $lit = new Lit($file, $module, $progenitor, $obj);

        return $lit;
    }
    public static function factoryEmptyList(File $file, Module $module, Progenitor $progenitor = null)
    {
        $obj = new EmptyList($file, $module, $progenitor);

        $lit = new Lit($file, $module, $progenitor, $obj);

        return $lit;
    }



    public function compile($fd, $indentation_level = 0)
    {
        $this->obj->compile($fd);
    }
}


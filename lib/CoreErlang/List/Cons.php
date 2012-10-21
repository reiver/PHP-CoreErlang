<?php

namespace CoreErlang;

abstract class Cons extends Progenitor implements ICompile, IConstant, IList
{
    private $head;
    private $tail;


    public function __construct(File $file, Module $module, Progenitor $progenitor = null, $head, IList $tail)
    {
        parent::__construct($file, $module, $progenitor);

        $this->head = $head;
        $this->tail = $tail;
    }


    public static function factoryArray(File $file, Module $module, Progenitor $progenitor = null, array $a)
    {
        $a = array_values($a);

        $obj = null;

        if (  empty($a)  ) {
            $obj = new EmptyList($file, $module, $progenitor);
        } elseif (  1 == count($a) ) {
            $head = \CoreErlang::lit($file, $module, $progenitor, $a[0]);

            $tail = new EmptyList($file, $module, $progenitor);

            $obj = self::factory($file, $module, $progenitor, $head, $tail);
        } elseif (  2 <= count($a)  ) {
            $head = \CoreErlang::lit($file, $module, $progenitor, $a[0]);
            $tail = array_slice($a, 1);

            $tail_list = self::factoryArray($file, $module, $progenitor, $tail);

            $obj = self::factory($file, $module, $progenitor, $head, $tail_list);
        } else {
            // Should NEVER get here.
    /////// THROW
            throw new Exception();
        }

        return $obj;
    }
    public static function factory(File $file, Module $module, Progenitor $progenitor = null, $head, $tail)
    {
        $class_name = self::figureOutListType($head, $tail);

        $obj = new $class_name($file, $module, $progenitor, $head, $tail);

        return $obj;
    }



    public static function figureOutListType($head, $tail)
    {
        $class_name = null;
        if       (  $head instanceof IConstant   || $tail instanceof IConstant    ) {
            $class_name = 'CoreErlang\ConstantCons';
        } elseif (  $head instanceof IExpression || $tail instanceof IExpression  ) {
            $class_name = 'CoreErlang\ExpressionCons';
        } elseif (  $head instanceof IPattern    || $tail instanceof IPattern     ) {
            $class_name = 'CoreErlang\PatterCons';
        } else {
            // Error.
            throw new Exception('Mismatch between head and tail of List Cons operation.');
        }

        Exception::throwIfIsNull($class_name);

        return $class_name;
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


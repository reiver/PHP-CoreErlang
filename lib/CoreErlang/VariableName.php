<?php

namespace CoreErlang;

class VariableName extends Progenitor implements ICompile, IVar
{
    private $name;



    public function __construct(File $file, Module $module, Progenitor $progenitor = null, $name)
    {
        parent::__construct($file, $module, $progenitor);

        static::throwIfNotValidVariableName($name);

        $this->name  = $name;
    }



    private static function throwIfNotValidVariableName($actual, $message = null, $code = 0, \Exception $previous = null)
    {
    ////////////// THROW
        Exception::throwIfIsNotString($actual, $message, $code, $previous);

        if (  1 > strlen($actual)  ) {
    /////// THROW
            throw new Exception($message, $code, $previous);
        }

        if (  strtoupper($actual{0}) != $actual{0}  ) {
    /////// THROW
            throw new Exception($message, $code, $previous);
        }

        $first_character_is_capital_letter = ('A' <= $actual{0} && 'Z' >= $actual{0});
        $first_character_is_underscore     = ('_' == $actual{0});
        if (  ! $first_character_is_capital_letter && ! $first_character_is_underscore  ) {
    /////// THROW
            throw new Exception($message, $code, $previous);
        }

        $length = strlen($actual);
        if (  1 < $length  ) {
            for ($i=1; $i<$length; $i++) {

                $c = $actual{$i};

                $is_lowercase_letter = ('a' <= $c && 'z' >= $c);
                $is_uppercase_letter = ('A' <= $c && 'Z' >= $c);
                $is_numerical_digit  = ('0' <= $c && '9' >= $c);

                if (  ! $is_lowercase_letter && ! $is_uppercase_letter && ! $is_numerical_digit  ) {
    /////////////// THROW
                    throw new Exception($message, $code, $previous);
                }

            } // for
        }
    }



    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        static::throwIfNotValidVariableName($name);

        $this->name = $name;

        return $this;
    }



    public function compile($fd, $indentation_level = 0)
    {
        $s = (string)$this->name;
        fwrite($fd, $s);
    }
}


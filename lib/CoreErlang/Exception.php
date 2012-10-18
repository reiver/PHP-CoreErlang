<?php

namespace CoreErlang;

class Exception extends \Exception
{
    public function __construct($message = null, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }



    public static function throwIfNotInstanceOf($expected, $actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  ! $actual instanceof $expected  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }

    public static function throwIfInstanceOf($expected, $actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  $actual instanceof $expected  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }



    public static function throwIfNotEquals($expected, $actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  $expected !== $actual  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }

    public static function throwIfEquals($expected, $actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  $expected === $actual  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }



    public static function throwIfIsNotSting($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  !is_string($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }

    public static function throwIfIsSting($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  is_string($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }
}

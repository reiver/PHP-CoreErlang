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



    public static function throwIfNotInstanceOfAny($expected, $actual, $message = null, $code = 0, \Exception $previous = null)
    {
        $is_instance_of_any = false;
        if (  is_array($expected) && !empty($expected)  ) {
            foreach ($expected AS $ex) {
                $is_instance_of_any = $is_instance_of_any || ($actual instanceof $ex);
            } // foreach
        }

        if (  ! $is_instance_of_any  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }

    public static function throwIfInstanceOfAny($expected, $actual, $message = null, $code = 0, \Exception $previous = null)
    {
        $is_instance_of_any = false;
        if (  is_array($expected) && !empty($expected)  ) {
            foreach ($expected AS $ex) {
                $is_instance_of_any = $is_instance_of_any || ($actual instanceof $ex);
            } // foreach
        }

        if (  $is_instance_of_any  ) {
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



    public static function throwIfIsNotString($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  !is_string($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }

    public static function throwIfIsString($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  is_string($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }



    public static function throwIfIsNotInt($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  !is_int($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }

    public static function throwIfIsInt($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  is_int($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }



    public static function throwIfIsNotFloat($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  !is_float($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }

    public static function throwIfIsFloat($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  is_float($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }



    public static function throwIfIsNotChar($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  !is_string($actual) || 1 != strlen($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }

    public static function throwIfIsChar($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  is_string($actual) && 1 == strlen($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }



    public static function throwIfIsNotNull($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  !is_null($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }

    public static function throwIfIsNull($actual, $message = null, $code = 0, \Exception $previous = null)
    {
        if (  is_null($actual)  ) {
    /////// THROW
            throw new static($message, $code, $previous);
        }
    }
}

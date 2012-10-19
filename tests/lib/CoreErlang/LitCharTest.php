<?php

require_once(  __DIR__ .'/../../CoreErlangProgenitorTestCase.php'  );

class LitCharTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor_value = chr(  rand(1,127)  );
        $progenitor = CoreErlang\Lit::factoryChar($file, $module, null, $progenitor_value);

        $value = chr(  rand(1,127)  );
        $obj = CoreErlang\Lit::factoryChar($file, $module, $progenitor, $value);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testGetAndSetValue()
    {
        list($file, $module) = $this->generateFileAndModule();

        $value1 = chr(  rand(1,127)  );

        $string = CoreErlang\Lit::factoryChar($file, $module, null, $value1);

        $this->assertEquals($value1, $string->getValue());



        $value2 = chr(  rand(1,127)  );

        $string->setValue($value2);

        $this->assertEquals($value2, $string->getValue());
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();
        $value = chr(  rand(1,127)  );
        $obj = CoreErlang\Lit::factoryChar($file, $module, null, $value);

//@TODO - Is this the proper way to escape a string in Erlang.
        $expected_compiled_contents = '\''. $obj->getValue() .'\'';

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }

}

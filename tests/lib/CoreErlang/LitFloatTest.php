<?php

require_once(  __DIR__ .'/../../CoreErlangProgenitorTestCase.php'  );

class LitFloatTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor_value = (float) ( rand(-9999,9999) / 7000.0 );
        $progenitor = CoreErlang\Lit::factoryFloat($file, $module, null, $progenitor_value);

        $value = (float) ( rand(-9999,9999) / 7000.0 );
        $obj = CoreErlang\Lit::factoryFloat($file, $module, $progenitor, $value);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testGetAndSetValue()
    {
        list($file, $module) = $this->generateFileAndModule();

        $value1 = (float) ( rand(-9999,9999) / 7000.0 );

        $string = CoreErlang\Lit::factoryFloat($file, $module, null, $value1);

        $this->assertEquals($value1, $string->getValue());



        $value2 = (float) ( rand(-9999,9999) / 7000.0 );

        $string->setValue($value2);

        $this->assertEquals($value2, $string->getValue());
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();
        $value = (float) ( rand(-9999,9999) / 7000.0 );
        $obj = CoreErlang\Lit::factoryFloat($file, $module, null, $value);

//@TODO - Is this the proper way to escape a string in Erlang.
        $expected_compiled_contents = $obj->getValue();

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }

}

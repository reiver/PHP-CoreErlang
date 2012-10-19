<?php

require_once(  __DIR__ .'/../../CoreErlangProgenitorTestCase.php'  );

class LitIntegerTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor_value = rand(-9999,9999);
        $progenitor = CoreErlang\Lit::factoryInteger($file, $module, null, $progenitor_value);

        $value = rand(-9999,9999);;
        $obj = CoreErlang\Lit::factoryInteger($file, $module, $progenitor, $value);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testGetAndSetValue()
    {
        list($file, $module) = $this->generateFileAndModule();

        $value1 = rand(-9999,9999);

        $string = CoreErlang\Lit::factoryInteger($file, $module, null, $value1);

        $this->assertEquals($value1, $string->getValue());



        $value2 = rand(-9999,9999);

        $string->setValue($value2);

        $this->assertEquals($value2, $string->getValue());
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();
        $value = rand(-9999,9999);
        $obj = CoreErlang\Lit::factoryInteger($file, $module, null, $value);

        $expected_compiled_contents = $obj->getValue();

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }

}

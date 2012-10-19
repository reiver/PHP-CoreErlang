<?php

require_once(  __DIR__ .'/../../CoreErlangProgenitorTestCase.php'  );

class LitEmptyListTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor = CoreErlang\Lit::factoryEmptyList($file, $module, null);

        $obj = CoreErlang\Lit::factoryEmptyList($file, $module, $progenitor);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testGetAndSetValue()
    {
        list($file, $module) = $this->generateFileAndModule();

        $string = CoreErlang\Lit::factoryEmptyList($file, $module, null);

        $this->assertEquals(array(), $string->getValue());



        $value2 = array();

        $string->setValue($value2);

        $this->assertEquals($value2, $string->getValue());
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();
        $obj = CoreErlang\Lit::factoryEmptyList($file, $module, null);

//@TODO - Is this the proper way to escape a string in Erlang.
        $expected_compiled_contents = '[]';

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }

}

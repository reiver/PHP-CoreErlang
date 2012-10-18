<?php

require_once(  __DIR__ .'/../../CoreErlangProgenitorTestCase.php'  );

class FloatTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor_value = (float) ( rand(-9999,9999) / 7000.0 );
        $progenitor = new CoreErlang\Float($file, $module, null, $progenitor_value);

        $obj_value = (float) ( rand(-9999,9999) / 7000.0 );
        $obj = new CoreErlang\Float($file, $module, $progenitor, $obj_value);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();
        $value = (float) ( rand(-9999,9999) / 7000.0 );
        $obj = new CoreErlang\Float($file, $module, null, $value);

        $expected_compiled_contents = $value;

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }
}

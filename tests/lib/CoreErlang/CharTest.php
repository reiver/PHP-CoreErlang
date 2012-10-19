<?php

require_once(  __DIR__ .'/../../CoreErlangProgenitorTestCase.php'  );

class CharTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor_value = chr( rand(1,127)  );
        $progenitor = new CoreErlang\Char($file, $module, null, $progenitor_value);

        $obj_value = chr(  rand(1,127)  );
        $obj    = new CoreErlang\Char($file, $module, $progenitor, $obj_value);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testGetAndSetValue()
    {
        list($file, $module) = $this->generateFileAndModule();

        $value1 = chr(  rand(1,127)  );

        $obj = new CoreErlang\Char($file, $module, null, $value1);

        $this->assertEquals($value1, $obj->getValue());



        $value2 = chr(  rand(1,127)  );

        $obj->setValue($value2);

        $this->assertEquals($value2, $obj->getValue());
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();
        $value = chr(  rand(1,127)  );
        $obj = new CoreErlang\Char($file, $module, null, $value);

//@TODO - is this correct for a char?
        $expected_compiled_contents = '\''. $value .'\'';

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }
}

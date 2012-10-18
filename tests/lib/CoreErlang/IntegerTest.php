<?php

require_once(  __DIR__ .'/../../CoreErlangProgenitorTestCase.php'  );

class IntegerTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor_value = rand(-9999,9999);
        $progenitor = new CoreErlang\Integer($file, $module, null, $progenitor_value);

        $obj_value = rand(-9999,9999);
        $obj    = new CoreErlang\Integer($file, $module, $progenitor, $obj_value);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();
        $value = rand(-9999,9999);
        $obj = new CoreErlang\Integer($file, $module, null, $value);

        $expected_compiled_contents = $value;

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }
}

<?php

require_once(  __DIR__ .'/../../CoreErlangProgenitorTestCase.php'  );

class EmptyListTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor = new CoreErlang\EmptyList($file, $module, null);

        $obj = new CoreErlang\EmptyList($file, $module, $progenitor);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();
        $obj = new CoreErlang\EmptyList($file, $module, null);

        $expected_compiled_contents = '[]';

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }
}

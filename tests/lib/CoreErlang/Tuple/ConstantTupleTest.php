<?php

require_once(  __DIR__ .'/../../../CoreErlangProgenitorTestCase.php'  );

class ConstantTupleTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor = new CoreErlang\ConstantTuple($file, $module, null);

        $obj = new CoreErlang\ConstantTuple($file, $module, $progenitor);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();

        $tuple = new CoreErlang\ConstantTuple($file, $module, null);

        $tuple->append(1);
        $tuple->append(2);
        $tuple->append(3);
        $tuple->append(4);
        $tuple->append(5);

        $expected_compiled_contents = '{1, 2, 3, 4, 5}';

        $results = array($tuple, $expected_compiled_contents);

        return $results;
    }
}

<?php

require_once(  __DIR__ .'/../../CoreErlangProgenitorTestCase.php'  );

class VariableNameTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor_name = '_DoNotCare123';
        $progenitor = new CoreErlang\VariableName($file, $module, null, $progenitor_name);

        $obj_name = 'OneTwoThree';
        $obj    = new CoreErlang\VariableName($file, $module, $progenitor, $obj_name);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testGetAndSetName()
    {
        list($file, $module) = $this->generateFileAndModule();

        $name1 = 'Apple';

        $obj = new CoreErlang\VariableName($file, $module, null, $name1);

        $this->assertEquals($name1, $obj->getName());



        $name2 = 'Banana';

        $obj->setName($name2);

        $this->assertEquals($name2, $obj->getName());
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();
        $name = 'Apple123BananaCherry4567';
        $obj = new CoreErlang\VariableName($file, $module, null, $name);

        $expected_compiled_contents = $name;

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }
}

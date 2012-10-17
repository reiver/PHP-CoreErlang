<?php

require_once(  __DIR__ .'/../../CoreErlangProgenitorTestCase.php'  );

class AtomTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a value progenitor.
        $progenitor_value = 'testin123'.uniqid();
        $progenitor = new CoreErlang\Atom($file, $module, null, $progenitor_value);

        $obj_value = 'testin123'.uniqid();
        $obj    = new CoreErlang\Atom($file, $module, $progenitor, $obj_value);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testGetAndSetValue()
    {
        list($file, $module) = $this->generateFileAndModule();

        $value1 = 'testin123'.uniqid();

        $atom = new CoreErlang\Atom($file, $module, null, $value1);

        $this->assertEquals($value1, $atom->getValue());



        $value2 = 'anothertestin4567'.uniqid();

        $atom->setValue($value2);

        $this->assertEquals($value2, $atom->getValue());
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();
        $value1 = 'testin123'.uniqid();
        $obj = new CoreErlang\Atom($file, $module, null, $value1);

//@TODO - Is this the proper way to escape a string in Erlang.
        $expected_compiled_contents = '\''. $obj->getValue() .'\'';

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }
}

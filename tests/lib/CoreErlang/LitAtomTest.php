<?php

require_once(  __DIR__ .'/../../CoreErlangProgenitorTestCase.php'  );

class LitAtomTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor_value = 'testin123'.uniqid();
        $progenitor = CoreErlang\Lit::factoryAtom($file, $module, null, $progenitor_value);

        $value = 'testin123'.uniqid();
        $obj = CoreErlang\Lit::factoryAtom($file, $module, $progenitor, $value);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testGetAndSetValue()
    {
        list($file, $module) = $this->generateFileAndModule();

        $value1 = 'testin123'.uniqid();

        $string = CoreErlang\Lit::factoryAtom($file, $module, null, $value1);

        $this->assertEquals($value1, $string->getValue());



        $value2 = 'anothertestin4567'.uniqid();

        $string->setValue($value2);

        $this->assertEquals($value2, $string->getValue());
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();
        $value = 'testin123'.uniqid();
        $obj = CoreErlang\Lit::factoryAtom($file, $module, null, $value);

//@TODO - Is this the proper way to escape a string in Erlang.
        $expected_compiled_contents = '\''. $obj->getValue() .'\'';

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }

}

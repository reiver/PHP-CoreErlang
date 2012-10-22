<?php

require_once(  __DIR__ .'/../../../CoreErlangProgenitorTestCase.php'  );

class FnameTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor_value = 'testin123'.uniqid();
        $progenitor = new CoreErlang\Atom($file, $module, null, $progenitor_value);

        $obj    = new CoreErlang\Fname($file, $module, $progenitor);
        $obj->setAtom(  'test123ing'.uniqid()  )
            ->setInteger(  rand(0,9999)  )
            ;

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testGetAndSetAtom()
    {
        list($file, $module) = $this->generateFileAndModule();

        $fname = new CoreErlang\Fname($file, $module, null);

        $atom_value1 = 'testin123'.uniqid();
        $fname->setAtom($atom_value1);

        $this->assertEquals($atom_value1, $fname->getAtomValue());



        $atom_value2 = 'anothertestin4567'.uniqid();
        $fname->setAtom($atom_value2);

        $this->assertEquals($atom_value2, $fname->getAtomValue());
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();

        $atom_value    = 'test123ing'.uniqid();
        $integer_value = rand(0,9999);

        $obj    = new CoreErlang\Fname($file, $module, null);
        $obj->setAtom($atom_value)
            ->setInteger($integer_value)
            ;

//@TODO - Is this the proper way to escape a string in Erlang.
        $expected_compiled_contents = '\''. $atom_value .'\'' .'/'. $integer_value;

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }
}

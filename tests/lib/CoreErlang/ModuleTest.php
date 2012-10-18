<?php

require_once(  __DIR__ .'/../../CoreErlangGrandProgenitorTestCase.php'  );

class ModuleTest extends CoreErlangGrandProgenitorTestCase
{
    public function testCreate()
    {
        $file = $this->generateFile();

        $module_name = 'testin123'.uniqid();
        $obj = new CoreErlang\Module($file, $module_name);

        $null_module = null;
        $null_progenitor = null;

        $results = array($file, $null_module, $null_progenitor, $obj);

        return $results;
    }



    public function testGetNameAtom()
    {
        $file = $this->generateFile();

        $module_name = 'testin123'.uniqid();
        $module = new CoreErlang\Module($file, $module_name);

        $this->assertEquals($module_name, $module->getNameAtom()->getValue());
    }



    public function testCompilePre()
    {
        $file = $this->generateFile();

        $module_name = 'testin123'.uniqid();
        $obj = new CoreErlang\Module($file, $module_name);

//@TODO - Is this the proper way to escape a string in Erlang.
        $expected_compiled_contents = 'module \''. $module_name .'\' end'."\n";

        $results = array($obj, $expected_compiled_contents);

        return $results;
    }
}

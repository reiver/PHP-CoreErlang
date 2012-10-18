<?php

require_once(  __DIR__ .'/CoreErlangTestCase.php'  );

abstract class CoreErlangGrandProgenitorTestCase extends CoreErlangTestCase
{
    abstract public function testCreate();



    /**
     * @depends testCreate
     */
    public function testFileEnd($params)
    {
        list($file, $module, $progenitor, $obj) = $params;

        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\File'            , $file);
        if (  $obj instanceof Progenitor  ) {
            CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Module'      , $module);
            CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor'  , $progenitor);
        }
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\GrandProgenitor' , $obj);

        $this->assertEquals($file, $obj->fileEnd());
    }



    abstract public function testCompilePre();

    /**
     * @depends testCompilePre
     */
    public function testCompile($params)
    {
        list($obj, $expected_compiled_contents) = $params;

        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\ICompile', $obj);

        $fd = $this->compileBegin();
            $obj->compile($fd);
        $compiled_contents = $this->compileEnd();

        $this->assertEquals($expected_compiled_contents, $compiled_contents);
    }
}

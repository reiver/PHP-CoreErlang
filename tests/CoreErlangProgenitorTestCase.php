<?php

require_once(  __DIR__ .'/CoreErlangTestCase.php'  );

abstract class CoreErlangProgenitorTestCase extends CoreErlangTestCase
{
    abstract public function testCreate();



    /**
     * @depends testCreate
     */
    public function testFileEnd($params)
    {
        list($file, $module, $progenitor, $obj) = $params;

        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\File'       , $file);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Module'     , $module);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $progenitor);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $obj);

        $this->assertEquals($file, $obj->fileEnd());
    }

    /**
     * @depends testCreate
     */
    public function testModuleEnd($params)
    {
        list($file, $module, $progenitor, $obj) = $params;

        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\File'       , $file);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Module'     , $module);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $progenitor);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $obj);

        $this->assertEquals($module, $obj->moduleEnd());
    }

    /**
     * @depends testCreate
     */
    public function testEnd($params)
    {
        list($file, $module, $progenitor, $obj) = $params;

        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\File'       , $file);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Module'     , $module);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $progenitor);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $obj);

        $this->assertEquals($progenitor, $obj->end());
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

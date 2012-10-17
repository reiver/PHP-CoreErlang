<?php

require_once(  __DIR__ .'/CoreErlangTestCase.php'  );

abstract class CoreErlangProgenitorTestCase extends CoreErlangTestCase
{
    abstract public function testCreate();

    /**
     * @depends testCreate
     */
    public function testFileEnd($param)
    {
        list($file, $module, $progenitor, $obj) = $param;

        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\File'       , $file);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Module'     , $module);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $progenitor);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $obj);

        $this->assertEquals($file, $obj->fileEnd());
    }

    /**
     * @depends testCreate
     */
    public function testModuleEnd($param)
    {
        list($file, $module, $progenitor, $obj) = $param;

        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\File'       , $file);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Module'     , $module);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $progenitor);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $obj);

        $this->assertEquals($module, $obj->moduleEnd());
    }

    /**
     * @depends testCreate
     */
    public function testEnd($param)
    {
        list($file, $module, $progenitor, $obj) = $param;

        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\File'       , $file);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Module'     , $module);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $progenitor);
        CoreErlang\Exception::throwIfNotInstanceOf('CoreErlang\Progenitor' , $obj);

        $this->assertEquals($progenitor, $obj->end());
    }
}

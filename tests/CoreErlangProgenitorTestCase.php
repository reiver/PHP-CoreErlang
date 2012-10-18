<?php

require_once(  __DIR__ .'/CoreErlangGrandProgenitorTestCase.php'  );

abstract class CoreErlangProgenitorTestCase extends CoreErlangGrandProgenitorTestCase
{
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
}

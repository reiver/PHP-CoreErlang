<?php

require_once(  __DIR__ .'/../../../CoreErlangProgenitorTestCase.php'  );

class ConsTest extends CoreErlangProgenitorTestCase
{
    public function testCreate()
    {
        list($file, $module) = $this->generateFileAndModule();

        $random = rand(0,5);
        $arr = array();
        if (  0 < $random  ) {
            for ($i=0; $i < $random; $i++) {

                $arr[] = rand(-9999,9999);

            } // for 
        }

        //@TODO - Really, this isn't a valid progenitor.
        $progenitor = CoreErlang\Cons::factoryArray($file, $module, null, $arr);

        $random = rand(0,5);
        $arr = array();
        if (  0 < $random  ) {
            for ($i=0; $i < $random; $i++) {

                $arr[] = rand(-9999,9999);

            } // for 
        }

        $obj = CoreErlang\Cons::factoryArray($file, $module, $progenitor, $arr);

        $results = array($file, $module, $progenitor, $obj);

        return $results;
    }



    public function testCompilePre()
    {
        list($file, $module) = $this->generateFileAndModule();


        $one   = new CoreErlang\Integer($file, $module, null, 1);
        $two   = new CoreErlang\Integer($file, $module, null, 2);
        $three = new CoreErlang\Integer($file, $module, null, 3);
        $four  = new CoreErlang\Integer($file, $module, null, 4);
        $five  = new CoreErlang\Integer($file, $module, null, 5);

        $empty_list = new CoreErlang\EmptyList($file, $module, null);


        $cons_5 = new CoreErlang\ConstantCons($file, $module, null, $five  , $empty_list);
        $cons_4 = new CoreErlang\ConstantCons($file, $module, null, $four  , $cons_5);
        $cons_3 = new CoreErlang\ConstantCons($file, $module, null, $three , $cons_4);
        $cons_2 = new CoreErlang\ConstantCons($file, $module, null, $two   , $cons_3);
        $cons_1 = new CoreErlang\ConstantCons($file, $module, null, $one   , $cons_2);

        $expected_compiled_contents = '[1|[2|[3|[4|[5|[]]]]]]';

        $results = array($cons_1, $expected_compiled_contents);

        return $results;
    }
}

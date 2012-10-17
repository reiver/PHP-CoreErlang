<?php

require_once(  __DIR__ .'/../../CoreErlangTestCase.php'  );

class FileTest extends CoreErlangTestCase
{
    public function testGetAndSetName()
    {
        $name1 = 'testin123'.uniqid();

        $file = new CoreErlang\File($name1);

        $this->assertEquals($name1, $file->getName());



        $name2 = 'anothertestin4567'.uniqid();

        $file->setName($name2);

        $this->assertEquals($name2, $file->getName());
    }

    public function testGetAndSetBasePath()
    {
        $name = 'testin123'.uniqid();
        $file = new CoreErlang\File($name);



        $base_path1 = '';

        $file->setBasePath($base_path1);

        $this->assertEquals($base_path1, $file->getBasePath());



        $base_path2 = '/tmp';

        $file->setBasePath($base_path2);

        $this->assertEquals($base_path2, $file->getBasePath());



        $base_path2 = '/'.uniqid().'/'.uniqid();

        $file->setBasePath($base_path2);

        $this->assertEquals($base_path2, $file->getBasePath());
    }

    public function testGetAndSetIndentation()
    {
        $expected_initial_indentation = "\t";

        $name = 'testin123'.uniqid();
        $file = new CoreErlang\File($name);

        $this->assertEquals($expected_initial_indentation, $file->getIndentation());



        $new_indentation = '    ';

        $file->setIndentation($new_indentation);

        $this->assertEquals($new_indentation, $file->getIndentation());
    }



    public function testModule()
    {
        $name = 'testin123'.uniqid();
        $file = new CoreErlang\File($name);

        $module = $file->module();

        $this->assertInstanceOf('CoreErlang\Module', $module);


        $moduleName = $module->getNameAtom()->getValue();

        $this->assertEquals($name, $moduleName);



        $moduleAgain = $file->module();
        $this->assertEquals($module, $moduleAgain);
    }



    public function testCompileToCoreFile()
    {
        $base_path = '/tmp';

        $name = 'testin123'.uniqid();
        $file = new CoreErlang\File($name);

        $file->setBasePath($base_path);

        $file->compileToCoreFile();

        $expected_path = $base_path .'/'. $name .'.core';

        $this->assertFileExists($expected_path);

        $unlinked = unlink($expected_path);
        $this->assertEquals(true, $unlinked);
    }
}

<?php

require_once(  '/usr/share/php/PHPUnit/Autoload.php'  );

require_once(  __DIR__ .'/../lib/CoreErlang/CoreErlang.php'  );

abstract class CoreErlangTestCase extends PHPUnit_Framework_TestCase
{
    private $tmp_file_name;
    private $tmp_fd;

    public function compileBegin()
    {
        $this->tmp_file_name = tempnam('/tmp', 'PHP-CoreErlang_UniTest_');
        $this->assertNotEquals(false, $this->tmp_file_name);

        $this->tmp_fd = fopen($this->tmp_file_name, 'w');
        $this->assertNotEquals(false, $this->tmp_fd);

        return $this->tmp_fd;
    }

    public function compileEnd()
    {
        fclose($this->tmp_fd);

        $contents = file_get_contents($this->tmp_file_name);
        $this->assertNotEquals(false, $contents);

        $unlinked = unlink($this->tmp_file_name);
        $this->assertTrue($unlinked, 'Could NOT unlink() temp file, used for compiling: '.var_export($this->tmp_file_name, true));

        return $contents;
    }



    public function generateFileAndModule()
    {
        $file = CoreErlang::file('unittest');
        $module = $file->module();

        $this->assertInstanceOf('CoreErlang\File',   $file);
        $this->assertInstanceOf('CoreErlang\Module', $module);

        $result = array($file, $module);

        return $result;
    }
}

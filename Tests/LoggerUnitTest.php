<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-29
 * Time: 7:58 PM
 */
include('../core/Logger.php');

class LoggerUnitTest extends PHPUnit_Framework_TestCase
{
    protected $loggerObject;

    public function setUp()
    {
        $this->loggerObject = new Logger("../Logs/Test");
    }

    public function testContainerCreation()
    {
        $this->assertInstanceOf(Logger::class,$this->loggerObject);
    }

    public function testFail()
    {
        $log = $this->loggerObject;
        $this->assertFalse(!is_int($log->log("Test".PHP_EOL) ));
    }

    public function testSuccessful()
    {
        $log = $this->loggerObject;
        $this->assertTrue(is_int($log->log("Test".PHP_EOL)));
    }

    public function tearDown()
    {
        unset($this->loggerObject);
    }
}

<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-28
 * Time: 9:38 PM
 */

include_once '../core/Container.php';
class ContainerUnitTest extends PHPUnit_Framework_TestCase
{
    protected $containerObject;

    public function setUp()
    {
        $this->containerObject = new Container();
    }

    public function testContainerCreation()
    {
        $this->assertInstanceOf(Container::class,$this->containerObject);
    }

    public function testReaderArray()
    {
        $container = $this->containerObject;
        $this->assertEmpty($container->getReaderQueries());
    }

    public function testWriterArray()
    {
        $container = $this->containerObject;
        $this->assertEmpty($container->getWriterQueries());
    }

    public function testConnection(){
        $container=$this->containerObject;
        $this->assertTrue(new mysqli() == $container->getCon());
    }

    public function tearDown()
    {
        unset($this->containerObject);
    }
}

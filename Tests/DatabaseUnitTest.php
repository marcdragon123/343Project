<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-28
 * Time: 9:35 PM
 */

include_once '../core/Database.php';
class DatabaseUnitTest extends PHPUnit_Framework_TestCase
{
    protected $dbObject;

    public function setUp()
    {
        $this->dbObject = new Database();
    }

    public function testDbCreation()
    {
        $this->assertInstanceOf(Database::class,$this->dbObject);
    }

    public function tearDown()
    {
        unset($this->dbObject);
    }
}

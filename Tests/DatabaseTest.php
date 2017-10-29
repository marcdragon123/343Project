<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-25
 * Time: 11:27 PM
 */

use PHPUnit\Framework\TestCase;
include '../core/Database.php';

class DatabaseTest extends TestCase
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

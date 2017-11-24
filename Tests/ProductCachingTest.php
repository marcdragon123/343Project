<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-19
 * Time: 12:40 AM
 */



require "../domain/core/File.php";
require "../domain/core/Product.php";

class ProductCachingTest extends PHPUnit_Framework_TestCase
{
    private $filecache;
    private $productToSave;

    public function setUp()
    {
        $this->filecache = new ProductFile("productTest.txt");
        $this->productToSave = new Product();
        $product = $this->productToSave;
        $product->setProductID(123);
        $product->setBrand("DELL");
        $product->setModel("AHAHAHAH I GOT THIS WORKING");
        $product->setPrice(120.00);
        $product->setSerialNumber("13AX4C");
        $product->setWeight(2.00);

    }

    public function testType()
    {
        $this->assertInstanceOf(ProductFile::class, $this->filecache);
        $this->assertInstanceOf(Product::class, $this->productToSave);
    }

    public function testWriteFile()
    {
        $cache = $this->filecache;
        $val = false;
        try {
            $val = $cache->write($this->productToSave, true);
        }
        catch (Exception $exception)
        {
            echo $exception;
        }
        $this->assertTrue($val==true);
    }

    public function testReadFile()
    {
        $returnedObj = null;
        $cache = $this->filecache;
        $expt = null;
        try {
            $val = $cache->readCache();
        } catch (Exception $exp) {
            echo $exp;
            $expt = $exp;
        }
        if ($expt == null) {
            $this->assertTrue($val[0]->getProductID() == $this->productToSave->getProductID());
            $this->assertTrue($val[0]->getWeight() == $this->productToSave->getWeight());
            $this->assertTrue($val[0]->getBrand() == $this->productToSave->getBrand());
            $this->assertTrue($val[0]->getModel() == $this->productToSave->getModel());
            $this->assertTrue($val[0]->getPrice() == $this->productToSave->getPrice());
            $this->assertTrue($val[0]->getSerialNumber() == $this->productToSave->getSerialNumber());
        }
    }

    public function tearDown()
    {
        $this->productToSave = null;
        $this->filecache->destroy();
    }
}

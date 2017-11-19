<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-18
 * Time: 11:04 PM
 */

require  "FileCaching.php";

class ProductFile extends FileCaching
{

    private $fileName;

    public function __construct($name = "products.txt")
    {
        $this->setFileName($name);
        $this->buildProductCache();
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    public function buildProductCache() {
        parent::build($this->getFileName());
    }

    public function readCache()
    {
        return parent::read($this->getFileName());
    }

}
<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-18
 * Time: 11:04 PM
 */

class ProductFile extends FileCaching
{


    public function __construct($name = "products.txt")
     {
         $this->setFileName($name);
         $this->buildProductCache();
     }

    public function buildProductCache() {
        parent::build($this->getFileName());
    }

    public function readCache()
    {
        return parent::read($this->getFileName());
    }

}
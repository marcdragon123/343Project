<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-19
 * Time: 3:50 PM
 */

class CustomerFile extends FileCaching
{
    public function __construct($name = "customers.txt")
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
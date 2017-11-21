<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-19
 * Time: 10:40 PM
 */

class UOWFile extends FileCaching
{
    public function __construct($name)
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
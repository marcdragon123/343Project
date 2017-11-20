<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 5:08 PM
 */

class Monitor extends Product {

    private $DisplayDimensions;

    /**
     * @return mixed
     */
    public function getDisplayDimensions()
    {
        return $this->DisplayDimensions;
    }

    /**
     * @param mixed $DisplayDimensions
     */
    public function setDisplayDimensions($DisplayDimensions)
    {
        $this->DisplayDimensions = $DisplayDimensions;
    }

    public function __construct($type)
    {
        parent::__construct($type);
    }
}
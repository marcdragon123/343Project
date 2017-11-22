<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-20
 * Time: 2:01 AM
 */

class Laptop extends Product
{

    private $DisplayDimensions;
    private $CPUType;
    private $CoreNumber;
    private $RAMSize;
    private $HDDSize;
    private $Battery;
    private $OS;
    private $ToucheScreenToggle;
    private $CameraToggle;

    public function __construct()
    {
        parent::__construct('Laptop');
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value) {
        $this->$name = $value;
    }

    /**
     * @param $name
     * @return int $id
     *
     */
    public function __get($name) {
        return $this->$name;
    }

}
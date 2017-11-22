<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-20
 * Time: 2:01 AM
 */

class Laptop extends Product
{

    protected $DisplayDimensions;
    protected $CPUType;
    protected $CoreNumber;
    protected $RAMSize;
    protected $HDDSize;
    protected $Battery;
    protected $OS;
    protected $ToucheScreenToggle;
    protected $CameraToggle;

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
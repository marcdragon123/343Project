<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-20
 * Time: 2:00 AM
 */

class Tablet extends Product
{
    private $DisplayDimensions;
    private $DisplaySize;
    private $CPUType;
    private $CoreNumber;
    private $RAMSize;
    private $HDDSize;
    private $Battery;
    private $OS;
    private $CameraInformation;

    public function __construct()
    {
        parent::__construct('Tablet');
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
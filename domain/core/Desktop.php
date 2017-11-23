<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-20
 * Time: 2:00 AM
 */

class Desktop extends Product
{

    protected $Dimensions;
    protected $CPUType;
    protected $CoreNumber;
    protected $RAMSize;
    protected $HDDSize;

    public function __construct()
    {
        parent::__construct('Desktop');
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
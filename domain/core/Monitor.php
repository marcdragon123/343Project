<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 5:08 PM
 */

class Monitor extends Product {

    protected $DisplaySize;

    public function __construct()
    {
        parent::__construct("Monitor");
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
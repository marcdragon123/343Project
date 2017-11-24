<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-24
 * Time: 3:44 PM
 */

class Transaction extends DomainObject
{
    protected $ID;
    protected $timeStamp;
    protected $isComplete;

    public function __construct()
    {
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
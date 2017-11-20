<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-13
 * Time: 9:47 PM
 */

abstract class DomainObject
{
    /**
     * @return int $id;
     */
    abstract function getID();

    /**
     * @param int $id
     */
    abstract function setID($id);
}
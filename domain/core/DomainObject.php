<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-13
 * Time: 9:47 PM
 */

 class DomainObject
{
    private $type;

    public function __construct($type)
    {
        switch($type){
            case 'Account': $this->type = new Account();
            case 'Product': $this->type= new Product();
        }

    }

    public function getType(){
        return $this->type->getClassName();
    }


     /**
     * @return int $id;
     */
    function getID(){}

    /**
     * @param int $id
     */
    function setID($id){}
}
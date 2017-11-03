<?php

class Model
{
    private $table_mapper;

    //Model communicates with table mapper
    public function __construct(){
    $this->table_mapper = new Container();
    }

    //Get the table mapper function
    public function getTableMapper(){
        return $this->table_mapper;
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-10-20
 * Time: 11:24 PM
 */

class CatalogModel extends Model{
    public function Index(){
        $this->query(''); //query goes here
        $rows = $this->resultSet();
        return $rows;
    }

}
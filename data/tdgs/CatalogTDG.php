<?php
/**
 * Created by PhpStorm.
 * users: leban
 * Date: 2017-11-19
 * Time: 1:47 PM
 */

class CatalogTDG extends Model
{


    public function selectAll()
    {
        $this->query("SELECT * FROM Product ORDER BY ID");
        $row = $this->resultSet();
        return $row;
    }

}
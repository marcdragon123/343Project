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
        //queries all the tables individually
        $this->query("SELECT * FROM Tablet ORDER BY ComputerModelNumber");
        $tablet = $this->resultSet();
        $this->query("SELECT * FROM Monitor ORDER BY MonitorModelNumber");
        $monitor = $this->resultSet();
        $this->query("SELECT * FROM DesktopComputer ORDER BY ComputerModelNumber");
        $desktop = $this->resultSet();
        $this->query("SELECT * FROM Laptop ORDER BY ComputerModelNumber");
        $laptop = $this->resultSet();
        $row = array();
        //merges all the arrays into $row variable and returning it
        array_merge($row, $tablet, $monitor, $desktop, $laptop);
        return $row;
    }

}
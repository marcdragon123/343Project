<?php
/**
 * Created by PhpStorm.
 * User: leban
 * Date: 2017-11-19
 * Time: 1:47 PM
 */

class CatalogTDG extends model
{

    public function __construct()
    {

    }

    public function selectAll()
    {
    $conn = $this->getConn();
    $sql = "SELECT * FROM Product ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
    }

}
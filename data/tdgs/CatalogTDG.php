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

    public function addLaptop(Laptop $obj)
    {
        $this->query('INSERT INTO Laptop (ModelNumber, DisplayDimensions, Brand, Price, CPUType, CoreNumber, RAMSize, Weight, HDDSize, Battery, OS, ToucheScreenToggle, CameraToggle, SerialNumber) VALUES(:ModelNumber, :DisplayDimesions, :Brand, :Price, :CPUType, :CoreNumber, :RAMSize, :Weight, :HDDSize, :Battery, :OS, :ToucheScreenToggle, :CameraToggle, :SerialNumber)');

        $this->bind(':ModelNumber', $obj->getModel());
        $this->bind(':DisplayDimensions', $obj->getDisplayDimensions());
        $this->bind(':Brand', $obj->getBrand());
        $this->bind(':Price', $obj->getPrice());
        $this->bind(':CPUType', $obj->getCPUType());
        $this->bind(':CoreNumber', $obj->getCoreNumber());
        $this->bind(':RAMSize', $obj->getRAMSize());
        $this->bind(':Weight', $obj->getWeight());
        $this->bind(':HDDSize', $obj->getHDDSize());
        $this->bind(':Battery', $obj->getBattery());
        $this->bind(':OS', $obj->getOS());
        $this->bind(':ToucheScreenToggle', $obj->getToucheScreenToggle());
        $this->bind(':CameraToggle', $obj->getCameraToggle());
        $this->bind(':SerialNumber', $obj->getSerialNumber());

        $this->execute();

        return $this->lastInsertId();

    }

    public function addTablet(Tablet $obj)
    {
        $this->query('INSERT INTO Tablet (ModelNumber, DisplaySize, DisplayDimesions, Brand, Price, CPUType, CoreNumber, RAMSize, Weight, HDDSize, Battery, OS, CameraInformation, SerialNumber) VALUES (:ModelNumber, :DisplaySize, :DisplayDimesions, :Brand, :Price, :CPUType, :CoreNumber, :RAMSize, :Weight, :HDDSize, :Battery, :OS, :CameraInformation, :SerialNumber)');

        $this->bind(':ModelNumber', $obj->getModel());
        $this->bind(':DisplaySize', $obj->getDisplaySize());
        $this->bind(':DisplayDimensions', $obj->getDisplayDimensions());
        $this->bind(':Brand', $obj->getBrand());
        $this->bind(':Price', $obj->getPrice());
        $this->bind(':CPUType', $obj->getCPUType());
        $this->bind(':CoreNumber', $obj->getCoreNumber());
        $this->bind(':RAMSize', $obj->getRAMSize());
        $this->bind(':Weight', $obj->getWeight());
        $this->bind(':HDDSize', $obj->getHDDSize());
        $this->bind(':Battery', $obj->getBattery());
        $this->bind(':OS', $obj->getOS());
        $this->bind(':CameraInformation', $obj->getCameraInformation());
        $this->bind(':SerialNumber', $obj->getSerialNumber());

        $this->execute();

        return $this->lastInsertId();

    }

    public function addDesktop(Desktop $obj)
    {
        $this->query('INSERT INTO DesktopComputer (ModelNumber, Dimensions, Brand, Price, CPUType, CoreNumber, RAMSize, Weight, HDDSize, SerialNumber) VALUES (:ModelNumber, :Dimensions, :Brand, :Price, :CPUType, :CoreNumber, :RAMSize, :Weight, :HDDSize, :SerialNumber)');

        $this->bind(':ModelNumber', $obj->getModel());
        $this->bind(':DisplaySize', $obj->getDimensions());
        $this->bind(':Brand', $obj->getBrand());
        $this->bind(':Price', $obj->getPrice());
        $this->bind(':CPUType', $obj->getCPUType());
        $this->bind(':CoreNumber', $obj->getCoreNumber());
        $this->bind(':RAMSize', $obj->getRAMSize());
        $this->bind(':Weight', $obj->getWeight());
        $this->bind(':HDDSize', $obj->getHDDSize());
        $this->bind(':SerialNumber', $obj->getSerialNumber());

        $this->execute();

        return $this->lastInsertId();

    }

    public function addMonitor(Monitor $obj)
    {
        $this->query('INSERT INTO Monitor (ModelNumber, DisplayDimesions, Brand, Price, Weight, SerialNumber) VALUES (:ModelNumber, :DisplayDimesions, :Brand, :Price, :Weight, :SerialNumber)');

        $this->bind(':ModelNumber', $obj->getModel());
        $this->bind(':DisplayDimensions', $obj->getDisplayDimensions());
        $this->bind(':Brand', $obj->getBrand());
        $this->bind(':Price', $obj->getPrice());
        $this->bind(':Weight', $obj->getWeight());
        $this->bind(':SerialNumber', $obj->getSerialNumber());

        $this->execute();

        return $this->lastInsertId();

    }

}
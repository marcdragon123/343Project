<?php
/**
 * author: Vartan Benohanian
 */

class desktopcomputerTDG extends Model
{
    /**
     * @param Product $product
     * @return mixed
     */
    public function get($product){
        $this->query('SELECT * FROM desktopcomputer WHERE SerialNumber = :SerialNumber');
        $this->bind(':SerialNumber', $product->__get('SerialNumber'));
        return $this->single();
    }

    /**
     * fetch all desktopcomputers from the DB
     *
     * @return array desktopcomputers
     */
    public function findAll()
    {
        $this->query('SELECT * FROM desktopcomputer ORDER BY ID');
        $desktopcomputers = $this->resultSet();
        return $desktopcomputers;
    }

    /**
     * @param Product object
     * @return string
     */
    public function insert($desktopcomputer)
    {
        $this->query('INSERT INTO desktopcomputer (ModelNumber, Dimensions, Brand, Price, CPUType, CoreNumber, RAMSize, Weight, HDDSize, SerialNumber)
                             VALUES(:ModelNumber, :DisplaySize, :DisplayDimensions, :Brand, :Price, :CPUType, :CoreNumber, :RAMSize, :Weight, :HDDSize, :Battery, :OS, :CameraInformation, :SerialNumber)');
        $this->bind(':ModelNumber', $desktopcomputer->__get('ModelNumber'));
        $this->bind(':Dimensions', $desktopcomputer->__get('Dimensions'));
        $this->bind(':Brand', $desktopcomputer->__get('Brand'));
        $this->bind(':Price', $desktopcomputer->__get('Price'));
        $this->bind(':CPUType', $desktopcomputer->__get('CPUType'));
        $this->bind(':CoreNumber', $desktopcomputer->__get('CoreNumber'));
        $this->bind(':RAMSize', $desktopcomputer->__get('RAMSize'));
        $this->bind(':Weight', $desktopcomputer->__get('Weight'));
        $this->bind(':HDDSize', $desktopcomputer->__get('HDDSize'));
        $this->bind(':SerialNumber', $desktopcomputer->__get('SerialNumber'));

        $this->execute();
        
        return $this->lastInsertId();
    }

    /**
     * delete a desktopcomputer from the DB
     * @param Product $product
     */
    public function delete($product)
    {
        $this->query('DELETE FROM desktopcomputer WHERE SerialNumber = :SerialNumber');
        $this->bind(':SerialNumber', $product->__get('SerialNumber'));
        $this->execute();

        return;
    }

    /**
     * update a desktopcomputer's specification
     * @param Product $desktopcomputer
     * @return string
     */

    public function update($desktopcomputer)
    {
        $this->query('UPDATE desktopcomputer SET ModelNumber = :ModelNumber, DisplaySize = :DisplaySize, DisplayDimensions = :DisplayDimensions, Brand = :Brand,
                            Price = :Price, CPUType = :CPUType, CoreNumber = :CoreNumber,
                            RAMSize = :RAMSize, Weight = :Weight, HDDSize = :HDDSize, Battery = :Battery, OS = :OS,
                            CameraInformation = :CameraInformation, SerialNumber = :SerialNumber) WHERE ID = :ID');
        $this->bind(':ID', $desktopcomputer->getID());
        $this->bind(':ModelNumber', $desktopcomputer->__get('ModelNumber'));
        $this->bind(':Dimensions', $desktopcomputer->__get('Dimensions'));
        $this->bind(':Brand', $desktopcomputer->__get('Brand'));
        $this->bind(':Price', $desktopcomputer->__get('Price'));
        $this->bind(':CPUType', $desktopcomputer->__get('CPUType'));
        $this->bind(':CoreNumber', $desktopcomputer->__get('CoreNumber'));
        $this->bind(':RAMSize', $desktopcomputer->__get('RAMSize'));
        $this->bind(':Weight', $desktopcomputer->__get('Weight'));
        $this->bind(':HDDSize', $desktopcomputer->__get('HDDSize'));
        $this->bind(':SerialNumber', $desktopcomputer->__get('SerialNumber'));

        $this->execute();

        return $this->lastInsertId();
    }
    
}
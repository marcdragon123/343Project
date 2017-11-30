<?php
/**
 * anania was here
 */

class laptopTDG extends Model
{
    /**
     * fetch single laptop from DB by model number
     * @param $serialNumber
     *
     * @return array $laptopData
     */
    public function find($serialNumber) {
        $this->query('SELECT * FROM laptop WHERE SerialNumber = :SerialNumber');//query goes here
        $this->bind(':SerialNumber', $serialNumber);

        return $this->single();
    }

    /**
     * fetch all laptops from DB
     *
     * @return array laptop
     */
    public function findAll()
    {
        $this->query('SELECT * FROM laptop ORDER BY ID');
        $laptops = $this->resultSet();
        return $laptops;
    }

    /**
     * @param Product object
     * @return string
     */
    public function insert($laptop)
    {
        $this->query('INSERT INTO laptop (ModelNumber, DisplayDimensions, Brand, Price, CPUType, CoreNumber, RAMSize, Weight, HDDSize, Battery, OS, ToucheScreenToggle, CameraToggle, SerialNumber, Sold) 
                             VALUES(:ModelNumber, :DisplayDimensions, :Brand, :Price, :CPUType, :CoreNumber,:RAMSize,:Weight,:HDDSize,:Battery,:OS,:ToucheScreenToggle, :CameraToggle, :SerialNumber, :Sold)');
        $this->bind(':ModelNumber', $laptop->__get('ModelNumber'));
        $this->bind(':DisplayDimensions', $laptop->__get('DisplayDimensions'));
        $this->bind(':Brand', $laptop->__get('Brand'));
        $this->bind(':Price', $laptop->__get('Price'));
        $this->bind(':CPUType', $laptop->__get('CPUType'));
        $this->bind(':CoreNumber', $laptop->__get('CoreNumber'));
        $this->bind(':RAMSize', $laptop->__get('RAMSize'));
        $this->bind(':Weight', $laptop->__get('Weight'));
        $this->bind(':HDDSize', $laptop->__get('HDDSize'));
        $this->bind(':Battery', $laptop->__get('Battery'));
        $this->bind(':OS', $laptop->__get('OS'));
        $this->bind(':ToucheScreenToggle', $laptop->__get('ToucheScreenToggle'));
        $this->bind(':CameraToggle', $laptop->__get('CameraToggle'));
        $this->bind(':SerialNumber', $laptop->__get('SerialNumber'));
        $this->bind(':Sold', $laptop->__get('Sold'));

        
        $this->execute();

        
        return $this->lastInsertId();
    }

    /**
     * deletes Product from DB
     * @param $serialNumber
     */
    public function delete($serialNumber)
    {
        $this->query('DELETE FROM laptop WHERE SerialNumber = :SerialNumber');
        $this->bind(':SerialNumber', $serialNumber);
        $this->execute();

        return;
    }

    /**
     * @param Product $laptop
     * @return string id
     */

    public function update($laptop)
    {
        $this->query('UPDATE laptop SET ModelNumber = :ModelNumber, DisplayDimensions = :DisplayDimensions, Brand = :Brand, Price = :Price,
                            Weight = :Weight, SerialNumber = :SerialNumber, Sold = :Sold) WHERE SerialNumber = :SerialNumber');
        $this->bind(':ModelNumber', $laptop->__get('ModelNumber'));
        $this->bind(':DisplayDimensions', $laptop->__get('DisplayDimensions'));
        $this->bind(':Brand', $laptop->__get('Brand'));
        $this->bind(':Price', $laptop->__get('Price'));
        $this->bind(':CPUType', $laptop->__get('CPUType'));
        $this->bind(':CoreNumber', $laptop->__get('CoreNumber'));
        $this->bind(':RAMSize', $laptop->__get('RAMSize'));
        $this->bind(':Weight', $laptop->__get('Weight'));
        $this->bind(':HDDSize', $laptop->__get('HDDSize'));
        $this->bind(':Battery', $laptop->__get('Battery'));
        $this->bind(':OS', $laptop->__get('OS'));
        $this->bind(':ToucheScreenToggle', $laptop->__get('ToucheScreenToggle'));
        $this->bind(':CameraToggle', $laptop->__get('CameraToggle'));
        $this->bind(':SerialNumber', $laptop->__get('SerialNumber'));
        $this->bind(':Sold', $laptop->__get('Sold'));

        $this->execute();

        return $this->lastInsertId();
    }



}
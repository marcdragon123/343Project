<?php
/**
 * anania was here
 */

class laptopTDG extends Model
{

    //maybe add here rest of attributes to make sqls easier to eliminate mistakes
    //and make it easier to change one to change all

    public function get($id){
        $this->query('SELECT * FROM laptop WHERE ID = :id');//query goes here
        $this->bind('id', $id);
        return $this->single();;
    }

    /**
     * fetch single laptop from DB by model number
     * @param $modelNumber
     *
     * @return array $laptopData
     */
    public function find($ModelNumber) {
        $this->query('SELECT * FROM laptop WHERE ModelNumber = :ModelNumber');//query goes here
        $this->bind('ModelNumber', $ModelNumber);

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
     * @param laptop object
     * @return string
     */
    public function insert($laptop)
    {
        $this->query('INSERT INTO laptop (ModelNumber, DisplayDimensions, Brand, Price, CPUType, CoreNumber, RAMSize, Weight, HDDSize, Battery, OS, ToucheScreenToggle, CameraToggle, SerialNumber) 
                             VALUES(:ModelNumber, :DisplayDimensions, :Brand, :Price, :CPUType, :CoreNumber,:RAMSize,:Weight,:HDDSize,:Battery,:OS,:ToucheScreenToggle, :CameraToggle, :SerialNumber)');
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
        
        
        $this->execute();

        
        return $this->lastInsertId();
    }

    /**
     * deletes laptop from DB
     * @param $id
     */
    public function delete($id)
    {
        $this->query('DELETE FROM laptop WHERE ID = :id');
        $this->bind('id', $id);
        $this->execute();

        return;
    }

    /**
     * @param laptop $laptop
     * @return string id
     */

    public function update(laptop $laptop)
    {
        $this->query('UPDATE laptop SET ModelNumber = :ModelNumber, DisplayDimensions = :DisplayDimensions, Brand = :Brand, Price = :Price,
                            Weight = :Weight, SerialNumber = :SerialNumber) WHERE ID = :ID');
        $this->bind(':ID', $laptop->getID());
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
        
        $this->execute();

        return $this->lastInsertId();
    }



}
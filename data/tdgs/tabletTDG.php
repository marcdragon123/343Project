<?php
/**
 * author: Vartan Benohanian
 */

class tabletTDG extends Model
{

    public function get($product) {
        $this->query('SELECT * FROM tablet WHERE SerialNumber = :SerialNumber');
        $this->bind(':SerialNumber', $product->__get('SerialNumber'));
        return $this->single();
    }


    /**
     * fetch single tablet from DB by ModelNumber
     * @param $ModelNumber
     *
     * @return array
     */
    public function find($ModelNumber) {
        $this->query('SELECT * FROM tablet WHERE ModelNumber = :ModelNumber');
        $this->bind('ModelNumber', $ModelNumber);

        return $this->single();
    }

    /**
     * fetch all tablets from the DB
     *
     * @return array tablets
     */
    public function findAll()
    {
        $this->query('SELECT * FROM tablet ORDER BY ID');
        $tablets = $this->resultSet();
        return $tablets;
    }

    /**
     * @param Product object
     * @return string
     */
    public function insert($tablet)
    {
        $this->query('INSERT INTO tablet (ModelNumber, DisplaySize, DisplayDimensions, Brand, Price, CPUType, CoreNumber, RAMSize, Weight, HDDSize, Battery, OS, CameraInformation, SerialNumber)
                             VALUES(:ModelNumber, :DisplaySize, :DisplayDimensions, :Brand, :Price, :CPUType, :CoreNumber, :RAMSize, :Weight, :HDDSize, :Battery, :OS, :CameraInformation, :SerialNumber)');
        $this->bind(':ModelNumber', $tablet->__get('ModelNumber'));
        $this->bind(':DisplaySize', $tablet->__get('DisplaySize'));
        $this->bind(':DisplayDimensions', $tablet->__get('DisplayDimensions'));
        $this->bind(':Brand', $tablet->__get('Brand'));
        $this->bind(':Price', $tablet->__get('Price'));
        $this->bind(':CPUType', $tablet->__get('CPUType'));
        $this->bind(':CoreNumber', $tablet->__get('CoreNumber'));
        $this->bind(':RAMSize', $tablet->__get('RAMSize'));
        $this->bind(':Weight', $tablet->__get('Weight'));
        $this->bind(':HDDSize', $tablet->__get('HDDSize'));
        $this->bind(':Battery', $tablet->__get('Battery'));
        $this->bind(':OS', $tablet->__get('OS'));
        $this->bind(':CameraInformation', $tablet->__get('CameraInformation'));
        $this->bind(':SerialNumber', $tablet->__get('SerialNumber'));

        $this->execute();
        
        return $this->lastInsertId();
    }

    /**
     * delete a tablet from the DB
     * @param $id
     */
     public function delete($product)
    {
        $this->query('DELETE FROM tablet WHERE SerialNumber = :SerialNumber');
        $this->bind(':SerialNumber', $product->__get('SerialNumber'));
        $this->execute();

        return;
    }

    /**
     * @param Product $tablet
     * @return string
     */

    public function update(Product $tablet)
    {
        $this->query('UPDATE tablet SET ModelNumber = :ModelNumber, DisplaySize = :DisplaySize, DisplayDimensions = :DisplayDimensions, Brand = :Brand,
                            Price = :Price, CPUType = :CPUType, CoreNumber = :CoreNumber,
                            RAMSize = :RAMSize, Weight = :Weight, HDDSize = :HDDSize, Battery = :Battery, OS = :OS,
                            CameraInformation = :CameraInformation, SerialNumber = :SerialNumber) WHERE ID = :ID');
        $this->bind(':ID', $tablet->getID());
        $this->bind(':ModelNumber', $tablet->__get('ModelNumber'));
        $this->bind(':DisplaySize', $tablet->__get('DisplaySize'));
        $this->bind(':DisplayDimensions', $tablet->__get('DisplayDimensions'));
        $this->bind(':Brand', $tablet->__get('Brand'));
        $this->bind(':Price', $tablet->__get('Price'));
        $this->bind(':CPUType', $tablet->__get('CPUType'));
        $this->bind(':CoreNumber', $tablet->__get('CoreNumber'));
        $this->bind(':RAMSize', $tablet->__get('RAMSize'));
        $this->bind(':Weight', $tablet->__get('Weight'));
        $this->bind(':HDDSize', $tablet->__get('HDDSize'));
        $this->bind(':Battery', $tablet->__get('Battery'));
        $this->bind(':OS', $tablet->__get('OS'));
        $this->bind(':CameraInformation', $tablet->__get('CameraInformation'));
        $this->bind(':SerialNumber', $tablet->__get('SerialNumber'));

        $this->execute();

        return $this->lastInsertId();
    }

}
<?php
/**
 * anania was here
 */

class monitorTDG extends Model
{

    /**
     * fetch single monitor from DB by model number
     * @param SerialNumber
     *
     * @return array $monitorData
     */
    public function find($serialNumber) {
        $this->query('SELECT * FROM monitor WHERE SerialNumber = :SerialNumber');//query goes here
        $this->bind(':serialNumber', $serialNumber);

        return $this->single();
    }

    /**
     * fetch all monitors from DB
     *
     * @return array monitors
     */
    public function findAll()
    {
        $this->query('SELECT * FROM monitor ORDER BY SerialNumber');
        $monitors = $this->resultSet();
        return $monitors;
    }

    /**
     * @param Monitor object
     * @return string
     */
    public function insert($monitor)
    {
        $this->query('INSERT INTO monitor (ModelNumber, DisplayDimensions, Brand, Price, Weight, SerialNumber) 
                             VALUES(:ModelNumber, :DisplayDimensions, :Brand, :Price, :Weight , :SerialNumber)');
        $this->bind(':ModelNumber', $monitor->__get('ModelNumber'));
        $this->bind(':DisplayDimensions', $monitor->__get('DisplayDimensions'));
        $this->bind(':Brand', $monitor->__get('Brand'));
        $this->bind(':Price', $monitor->__get('Price'));
        $this->bind(':Weight', $monitor->__get('Weight'));
        $this->bind(':SerialNumber', $monitor->__get('SerialNumber'));
        
        
        $this->execute();

        
        //return $this->lastInsertId();
    }

    /**
     * deletes monitor from DB
     * @param $serialNumber
     */
    public function delete($serialNumber)
    {
        $this->query('DELETE FROM monitor WHERE SerialNumber = :SerialNumber');
        $this->bind(':SerialNumber', $serialNumber);
        $this->execute();

        return;
    }

    /**
     * @param Monitor $monitor
     * @return string id
     */

    public function update(Monitor $monitor)
    {
        $this->query('UPDATE monitor SET ModelNumber = :ModelNumber, DisplayDimensions = :DisplayDimensions, Brand = :Brand, Price = :Price,
                            Weight = :Weight, SerialNumber = :SerialNumber) WHERE SerialNumber = :SerialNumber');
        $this->bind(':ModelNumber', $monitor->__get('ModelNumber'));
        $this->bind(':DisplayDimensions', $monitor->__get('DisplayDimensions'));
        $this->bind(':Brand', $monitor->__get('Brand'));
        $this->bind(':Price', $monitor->__get('Price'));
        $this->bind(':Weight', $monitor->__get('Weight'));
        $this->bind(':SerialNumber', $monitor->__get('SerialNumber'));
        
        $this->execute();

        //return $this->lastInsertId();
    }



}
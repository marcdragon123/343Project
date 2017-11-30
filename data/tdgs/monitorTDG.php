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
        $this->query('SELECT * FROM monitor ORDER BY ID');
        $monitors = $this->resultSet();
        return $monitors;
    }

    /**
     * @param Product object
     * @return string
     */
    public function insert($monitor)
    {
        $this->query('INSERT INTO monitor (ModelNumber, DisplayDimensions, Brand, Price, Weight, SerialNumber, Sold) 
                             VALUES(:ModelNumber, :DisplayDimensions, :Brand, :Price, :Weight , :SerialNumber, :Sold)');
        $this->bind(':ModelNumber', $monitor->__get('ModelNumber'));
        $this->bind(':DisplayDimensions', $monitor->__get('DisplayDimensions'));
        $this->bind(':Brand', $monitor->__get('Brand'));
        $this->bind(':Price', $monitor->__get('Price'));
        $this->bind(':Weight', $monitor->__get('Weight'));
        $this->bind(':SerialNumber', $monitor->__get('SerialNumber'));
        $this->bind(':Sold', $monitor->__get('Sold'));

        
        $this->execute();

        
        return $this->lastInsertId();
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
     * @param Product $monitor
     * @return string id
     */

    public function update($monitor)
    {
        $this->query('UPDATE monitor SET ModelNumber = :ModelNumber, DisplayDimensions = :DisplayDimensions, Brand = :Brand, Price = :Price,
                            Weight = :Weight, SerialNumber = :SerialNumber, Sold = :Sold) WHERE SerialNumber = :SerialNumber');
        $this->bind(':ModelNumber', $monitor->__get('ModelNumber'));
        $this->bind(':DisplayDimensions', $monitor->__get('DisplayDimensions'));
        $this->bind(':Brand', $monitor->__get('Brand'));
        $this->bind(':Price', $monitor->__get('Price'));
        $this->bind(':Weight', $monitor->__get('Weight'));
        $this->bind(':SerialNumber', $monitor->__get('SerialNumber'));
        $this->bind(':Sold', $monitor->__get('Sold'));


        $this->execute();

        return $this->lastInsertId();
    }



}
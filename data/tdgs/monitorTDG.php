<?php
/**
 * anania was here
 */

class monitorTDG extends Model
{

    //maybe add here rest of attributes to make sqls easier to eliminate mistakes
    //and make it easier to change one to change all

    /**
     * @param Product $product
     * @return mixed
     */
    public function get($product) {
        $this->query('SELECT * FROM monitor WHERE SerialNumber = :SerialNumber');
        $this->bind(':SerialNumber', $product->__get('SerialNumber'));
        return $this->single();
    }

    /**
     * fetch single monitor from DB by model number
     * @param $modelNumber
     *
     * @return array $monitorData
     */
    public function find($ModelNumber) {
        $this->query('SELECT * FROM monitor WHERE ModelNumber = :ModelNumber');//query goes here
        $this->bind('ModelNumber', $ModelNumber);

        return $this->single();
    }

    /**
     * fetch all monitors from DB
     *
     * @return array monitors
     */


    /**
     * fetch all monitors from the DB
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

        
        return $this->lastInsertId();
    }

     /**
     * delete a monitor from the DB
     * @param Product $product
     */
    public function delete($product)
    {
        $this->query('DELETE FROM monitor WHERE SerialNumber = :SerialNumber');
        $this->bind(':SerialNumber', $product->__get('SerialNumber'));
        $this->execute();

        return;
    }

    /**
     * @param monitor $monitor
     * @return string id
     */

    public function update(monitor $monitor)
    {
        $this->query('UPDATE monitor SET ModelNumber = :ModelNumber, DisplayDimensions = :DisplayDimensions, Brand = :Brand, Price = :Price,
                            Weight = :Weight, SerialNumber = :SerialNumber) WHERE ID = :ID');
        $this->bind(':ID', $monitor->getID());
        $this->bind(':ModelNumber', $monitor->__get('ModelNumber'));
        $this->bind(':DisplayDimensions', $monitor->__get('DisplayDimensions'));
        $this->bind(':Brand', $monitor->__get('Brand'));
        $this->bind(':Price', $monitor->__get('Price'));
        $this->bind(':Weight', $monitor->__get('Weight'));
        $this->bind(':SerialNumber', $monitor->__get('SerialNumber'));
        
        $this->execute();

        return $this->lastInsertId();
    }



}
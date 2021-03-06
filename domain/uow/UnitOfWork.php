<?php
/**
 * The Unit of Work object.
 *
 */
class UnitOfWork
{
    private static $instance=null;
    private $mapper;
    private $dirtyFile;
    private $newFile;
    private $deletedFile;
    private $dirtyObjects = array();
    private $newObjects = array();
    private $deletedObjects = array();

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new UnitOfWork();
        }
        return self::$instance;
    }

    /**
     * UnitOfWork constructor.
     */
    private function __construct()
    {
        $this->dirtyFile = new File('dirty.txt');
        $this->newFile = new File('new.txt');
        $this->deletedFile = new File('deleted.txt');
    }

    /**
     * commits to MapperAbstract $map
     * @param MapperAbstract $map
     */
    public function commit(MapperAbstract $map)
    {
        $this->insertNew($map);
        $this->updateDirty($map);
        $this->deleteRemoved($map);
    }

    public function registerDirty(DomainObject $object)
    {
        $tempContainer= $this->dirtyFile->read($this->dirtyFile->getFileName());
        $this->dirtyObjects = $tempContainer[0];
        $this->dirtyObjects[spl_object_hash($object)] = $object;

        $this->dirtyFile->write($this->dirtyObjects, true);
    }


    public function registerNew(DomainObject $object)
    {
        var_dump($object);
        $tempContainer= $this->newFile->read($this->newFile->getFileName());
        $this->newObjects = $tempContainer[0];

        // Check if we meet our criteria.

        if ($this->isDeleted($object)) {
            throw new Exception('Cannot register as new, object is marked for deletion.');
        }
        if ($this->isDirty($object)) {
            throw new Exception('Cannot register as new, object is marked as dirty.');
        }
        if ($this->isNew($object)) {
            throw new Exception('Cannot register as new, object is already marked as new.');
        }

        $this->newObjects[spl_object_hash($object)] = $object;
        var_dump($this->newObjects[spl_object_hash($object)]);
        $this->newFile->write($this->newObjects, false);

    }
    /**
     * @param DomainObject $object
     */
    public function registerDeleted(DomainObject $object)
    {
        $tempContainer= $this->deletedFile->read($this->deletedFile->getFileName());
        $this->deletedObjects = $tempContainer[0];

        $this->deletedObjects[spl_object_hash($object)] = $object;
        $this->deletedFile->write($this->deletedObjects, true);

    }
    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isDirty(DomainObject $object)
    {
        $tempContainer= $this->dirtyFile->read($this->dirtyFile->getFileName());
        $this->dirtyObjects = $tempContainer[0];
        return isset($this->dirtyObjects[spl_object_hash($object)]);
    }
    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isNew(DomainObject $object)
    {
        $tempContainer= $this->newFile->read($this->newFile->getFileName());
        $this->newObjects = $tempContainer[0];

        return isset($this->newObjects[spl_object_hash($object)]);
    }
    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isDeleted(DomainObject $object)
    {
        $tempContainer= $this->deletedFile->read($this->deletedFile->getFileName());
        $this->deletedObjects = $tempContainer[0];

        return isset($this->deletedObjects[spl_object_hash($object)]);
    }

    /**
     * @param MapperAbstract $map
     */
    public function insertNew($map){
        $tempContainer= $this->newFile->read($this->newFile->getFileName());
        $this->newObjects = $tempContainer[0];

        if(!is_null($this->newObjects)){
            var_dump($this->newObjects);
            foreach($this->newObjects as $newObject => $value) {
                $map->_insert($value);
            }
            $this->newFile->purge();
        }
    }

    /**
     * @param MapperAbstract $map
     */
    public function updateDirty($map){
        $tempContainer= $this->dirtyFile->read($this->dirtyFile->getFileName());
        $this->dirtyObjects = $tempContainer[0];

        if(!is_null($this->dirtyObjects)) {
            foreach ($this->dirtyObjects as $updateObject => $value) {
                $map->_update($value);
            }
            $this->newFile->purge();
        }

    }

    /**
     * @param MapperAbstract $map
     */
    public function deleteRemoved($map){
        $tempContainer= $this->dirtyFile->read($this->deletedFile->getFileName());
        $this->deletedObjects = $tempContainer[0];

        if(!is_null($this->deletedObjects)) {
            foreach ($this->deletedObjects as $deletedObject => $value) {
                $map->_delete($value);
            }
            $this->deletedFile->purge();
        }
    }
}
<?php
/**
 * The Unit of Work object.
 *
 */
class UnitOfWork
{
    private $mapper;
    private $dirtyObjects = array();
    private $newObjects = array();
    private $deletedObjects = array();
    /**
     * @param MapperAbstract $mapper
     */
    public function __construct(MapperAbstract $mapper)
    {
        $this->mapper = $mapper;
    }
    /**
     *
     */
    public function commit()
    {
        $this->insertNew();
        $this->updateDirty();
        $this->deleteRemoved();
    }
    /**
     * @param DomainObject $object
     */
    public function registerDirty(DomainObject $object)
    {
        $this->dirtyObjects[spl_object_hash($object)] = $object;
    }

    /**
     * Register an object as dirty. This is valid unless:
     * - The object is registered to be removed
     * - The object is registered as dirty (has been changed)
     * - The object is already registered as new
     * @param DomainObject $object
     * @throws Exception
     */
    public function registerNew(DomainObject $object)
    {
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
        $this->newObjects[ spl_object_hash($object) ] = $object;
    }
    /**
     * @param DomainObject $object
     */
    public function registerDeleted(DomainObject $object)
    {
        $this->deletedObjects[ spl_object_hash($object) ] = $object;
    }
    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isDirty(DomainObject $object)
    {
        return isset($this->dirtyObjects[ spl_object_hash($object) ]);
    }
    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isNew(DomainObject $object)
    {
        return isset($this->newObjects[ spl_object_hash($object) ]);
    }
    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isDeleted(DomainObject $object)
    {
        return isset($this->deletedObjects[ spl_object_hash($object) ]);
    }

    public function insertNew(){
        foreach ($this->newObjects as $newObject) {
            $this->mapper->_insert($newObject);
        }
    }

    public function updateDirty(){
        foreach ($this->dirtyObjects as $updateObject) {
            $this->mapper->_update($updateObject);
        }
    }

    public function deleteRemoved(){
        foreach ($this->deletedObjects as $deletedObject) {
            $this->mapper->_delete($deletedObject);
        }
    }
}
<?php
/**
 * The Unit of Work object.
 *
 */
class UnitOfWork
{
    private $dirtyFile;
    private $newFile;
    private $deletedFile;
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
        $this->dirtyFile = new File('dirty.txt');
        $this->newFile = new File('new.txt');
        $this->deletedFile = new File('deleted.txt');
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
        $tempContainer= $this->dirtyFile->read($this->dirtyFile->getFileName());
        $this->dirtyObjects = $tempContainer[0];
        $this->dirtyObjects[spl_object_hash($object)] = $object;

        $this->dirtyFile->write($this->dirtyObjects, true);
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
        $this->newObjects[ spl_object_hash($object) ] = $object;
        $this->newFile->write($this->newObjects, true);

    }
    /**
     * @param DomainObject $object
     */
    public function registerDeleted(DomainObject $object)
    {
        $tempContainer= $this->deletedFile->read($this->deletedFile->getFileName());
        $this->deletedObjects = $tempContainer[0];

        $this->deletedObjects[ spl_object_hash($object) ] = $object;

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
        return isset($this->dirtyObjects[ spl_object_hash($object) ]);
    }
    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isNew(DomainObject $object)
    {
        $tempContainer= $this->newFile->read($this->newFile->getFileName());
        $this->newObjects = $tempContainer[0];

        return isset($this->newObjects[ spl_object_hash($object) ]);
    }
    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isDeleted(DomainObject $object)
    {
        $tempContainer= $this->deletedFile->read($this->deletedFile->getFileName());
        $this->deletedObjects = $tempContainer[0];

        $this->dirtyFile->write($this->dirtyObjects, true);
        return isset($this->deletedObjects[ spl_object_hash($object) ]);
    }

    public function insertNew(){
        $tempContainer= $this->newFile->read($this->newFile->getFileName());
        $this->newObjects = $tempContainer[0];

        foreach ($this->newObjects as $newObject) {
            $this->mapper->_insert($newObject);
        }
    }

    public function updateDirty(){
        $tempContainer= $this->dirtyFile->read($this->dirtyFile->getFileName());
        $this->dirtyObjects = $tempContainer[0];

        foreach ($this->dirtyObjects as $updateObject) {
            $this->mapper->_update($updateObject);
        }
    }

    public function deleteRemoved(){
        $tempContainer= $this->dirtyFile->read($this->deletedFile->getFileName());
        $this->deletedObjects = $tempContainer[0];

        foreach ($this->deletedObjects as $deletedObject) {
            $this->mapper->_delete($deletedObject);
        }
    }
}
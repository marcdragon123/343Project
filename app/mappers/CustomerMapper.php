<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 6:32 PM
 */

class CustomerMapper extends MapperAbstract{

    public $UOW;
    public $idMap;
    public $userTDG;

    public function __construct()
    {
        $this->UOW = new UnitOfWork($this);
        $this->idMap = new IdMap();
        $this->userTDG = new UserTDG();
    }

    /**
     * Fetch a user object by ID
     *
     * An example skeleton of a "Fetch" function showing
     * how the database data ($dataFromDb) is used to
     * create a new User instance via the create function.
     *
     * @param string $id
     * @return Account
     */
    public function findById($id){
        $dbData = array(
            'email' => $id,
            );
        return $this->create($dbData);
    }

    /**
     * @param array $post
     * @return string
     */
    public function createAccount(array $post){
        $userTDG = new UserTDG();
        //TODO: must call the idmap and uow

        return $userTDG->insert($post);
    }

    /**
     * @param array|null $data
     * @return Customer
     */
    public function create(array $data = null)
    {
        $obj = $this->_create();

        if($data){
            $obj = $this->populate($obj, $data);
        }

        $this->idMap->add('Customer', $obj);
        $this->UOW->registerNew($obj);
        $this->UOW->commit();
    }

    /**
     * @param Account $obj
     */
    public function save(Account $obj)
    {
        if(is_null($obj->__get("id"))){
            $this->_insert($obj);
        } else {
            $this->_update($obj);
        }
    }

    /**
     * @param Account $obj
     */
    public function delete(Account $obj)
    {
        $this->_delete($obj);
    }

    /**
     * Populate the Customer (AccountObj) with
     * the data array.
     *
     * This is a very simple example, but the mapping
     * can be as complex as required.
     *
     * @param Account $obj
     * @param array $data
     * @return Customer
     */
    public function populate(Account $obj, array $data){
        $obj->__set("firstName", $data['firstName']);
        $obj->__set("lastName", $data['lastName']);
        $obj->__set("password", $data['password']);
        $obj->__set("email", $data['email']);
        $obj->__set("phone", $data['phone']);
        $obj->__set("streetNumber", $data['streetNumber']);
        $obj->__set("streetName", $data['streetName']);
        $obj->__set("city", $data['city']);
        $obj->__set("province", $data['province']);
        $obj->__set("postalCode", $data['postalCode']);
        $obj->__set("country", $data['country']);

        return $obj;
    }

    /**
     * Create a new User DomainObject
     *
     * @return Customer
     */
    public function _create(){
        return new Customer();
    }

    /**
     * Insert the DomainObject in persistent storage
     *
     * This may include connecting to the database
     * and running an insert statement.
     *
     * @param Account $obj
     */
    public function _insert(Account $obj)
    {
        //var_dump($obj->__get('firstName'));

        $this->userTDG->insert($obj);
    }

    /**
     * Update the DomainObject in persistent storage
     *
     * This may include connecting to the database
     * and running an update statement.
     *
     * @param Account $obj
     */
    public function _update(Account $obj)
    {
        //$this->userTDG->update($obj);
    }

    /**
     * Delete the DomainObject from persistent storage
     *
     * This may include connecting to the database
     * and running a delete statement.
     *
     * @param Account $obj
     */
    public function _delete(Account $obj)
    {
        //$this->userTDG->delete($obj->getID());
    }

    /**
     *
     */
    //updateloginsession
    //clearallloginsessions

}
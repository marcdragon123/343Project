<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 6:32 PM
 */

class CustomerMapper extends MapperAbstract{

    public $UOW;
    public $userTDG;
    private static $instance = null;


    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new CustomerMapper();
        }

        return self::$instance;
    }

    private function __construct() {
        $this->UOW = new UnitOfWork($this);
        $this->userTDG = new UserTDG();
    }

    /**
     * @param array $post
     * @return bool
     */
    public function login(array $post) {

        $userObj = IdMap::getInstance()->get('Customer',$post['Email']);
        if(!is_null($userObj)) {
            if ($userObj->__get('Password') !== $post['Password']) {
                Messages::setMsg("wrong password", 'error');
                return false;
            }
            Messages::setMsg("Welcome ".$userObj->__get('FirstName'), '');
            return true;
        }
        $userObj = $this->userTDG->find($post['Email']);
        if(!is_null($userObj)){
            Messages::setMsg('Email Does not exist', 'error');
            return false;
        }
        if($userObj['Password'] === $post['Password']){
            $this->create($userObj);
            $this->updateLoginSession();
            return true;
            }
    }

    /**
     * @param array $post
     * @return string
     * @throws Exception
     */
    public function createAccount(array $post){
        $userTDG = new UserTDG();
        if(!is_null($userTDG->find($post['Email']))){
            throw new Exception("this email already exists");
        }
        //$userObj = $userTDG->insert($post);
        $this->create($post);

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
        $id = $this->userTDG->insert($obj);
        $obj->setID($id);
        IdMap::getInstance()->add($obj, 'Customer');

        $this->UOW->registerNew($obj);
        return $obj;
    }

    /**
     * @param Account $obj
     */
    public function save(Account $obj)
    {
        if(is_null($obj->__get("UserID"))){
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


        function __construct($array) {
            foreach ($array as $key => $value) {
                $this->$key = $value;
            }
        }

        $obj->__set("FirstName", $data['FirstName']);
        $obj->__set("LastName", $data['LastName']);
        $obj->__set("Password", $data['Password']);
        $obj->__set("Email", $data['Email']);
        $obj->__set("Phone", $data['Phone']);
        $obj->__set("StreetNumber", $data['StreetNumber']);
        $obj->__set("StreetName", $data['StreetName']);
        $obj->__set("City", $data['City']);
        $obj->__set("Province", $data['Province']);
        $obj->__set("PostalCode", $data['PostalCode']);
        $obj->__set("Country", $data['Country']);
        $obj->__set("LoginStatus", 0);
        $obj->__set("Type", 0);


        return $obj;
    }

    /**
     * Create a new users DomainObject
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
    public function updateLoginSession(){
        //$this->UOW->registerDirty($this);
        //$this->UOW->commit();

    }

}
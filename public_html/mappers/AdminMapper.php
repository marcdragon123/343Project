<?php
/**
 * 
 *  Anania
 */

class AdminMapper extends MapperAbstract{

    public $UOW;
    public $userTDG;
    private static $instance = null;


    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new AdminMapper();
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


        
        $userObj = IdMap::getInstance()->get('Admin',$post['Email']);
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
     * @return Administrator
     */
    public function create(array $data = null)
    {
        $obj = $this->_create();

        if($data){
            $obj = $this->populate($obj, $data);
        }
        $id = $this->userTDG->insert($obj);
        $obj->setID($id);
        IdMap::getInstance()->add($obj, 'Admin');

        $this->UOW->registerNew($obj);
        return $obj;
    }

    /**
     * @param Administrator $obj
     */
    public function save($obj)
    {
        if(is_null($obj->__get("UserID"))){
            $this->_insert($obj);
        } else {
            $this->_update($obj);
        }
    }

    /**
     * @param Administrator $obj
     */
    public function delete($obj)
    {
        $this->_delete($obj);
    }

    /**
     * Populate the Account (AccountObj) with
     * the data array.
     *
     * This is a very simple example, but the mapping
     * can be as complex as required.
     *
     * @param Administrator $obj
     * @param array $data
     * @return Administrator
     */
    public function populate($obj, array $data){


        function __construct($array) {
            foreach ($array as $key => $value) {
                $this->$key = $value;
            }
        }

        $obj->__set("FirstName", $data['FirstName']);
        $obj->__set("LastName", $data['LastName']);
        $obj->__set("Password", $data['Password']);
        $obj->__set("Email", $data['Email']);
        $obj->__set("PhoneNumber", $data['PhoneNumber']);
        $obj->__set("StreetNumber", $data['StreetNumber']);
        $obj->__set("StreetName", $data['StreetName']);
        $obj->__set("City", $data['City']);
        $obj->__set("Province", $data['Province']);
        $obj->__set("PostalCode", $data['PostalCode']);
        $obj->__set("Country", $data['Country']);
        $obj->__set("LoginStatus", 0);
        $obj->__set("Type", A);


        return $obj;
    }

    /**
     * Create a new users DomainObject
     *
     * @return Administrator
     */
    public function _create(){
        return new Administrator();
    }

    /**
     * Insert the DomainObject in persistent storage
     *
     * This may include connecting to the database
     * and running an insert statement.
     *
     * @param Administrator $obj
     */
    public function _insert($obj)
    {
        //var_dump($obj->__get('firstName'));

        $this->userTDG->insert($obj);
    }

    /**
     * Update the Administrator in persistent storage
     *
     * This may include connecting to the database
     * and running an update statement.
     *
     * @param Administrator $obj
     */
    public function _update($obj)
    {
        //$this->userTDG->update($obj);
    }

    /**
     * Delete the DomainObject from persistent storage
     *
     * This may include connecting to the database
     * and running a delete statement.
     *
     * @param Administrator $obj
     */
    public function _delete($obj)
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
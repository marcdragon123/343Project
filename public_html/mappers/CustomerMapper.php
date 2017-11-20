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
        //1
        //check db for an with email, password
        //set to container 
        //if it is, means valid username/password, else, invalid login

        //2
        //check container for email
        //if found in container, compare passwords and return
        //if not found in container, query db, add to container, compare passwords, and return

        //2 implementation
        $account = IdMap::getInstance()->findByEmail($post['email']);
        if(is_null($account)){
            //not in container, get from db
            $account = $this->userTDG->find($post['email']);
            if(is_null($account)){
                //not even in db, this email has never been registered
                //TODO
                return false;
            }else{
                //users with email was in db
                IdMap::getInstance()->container[$account['UserID']] = $account;
            }
        }
        //if(($account->__get("password") === $post['password'])){
        if(($account['Password'] === $post['password'])){
            $this->updateLoginSession();
            return true;
        }

        //password is wrong
        return false;
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
        //echo "this is the id: ". $obj->getID();
        IdMap::getInstance()->add($obj);
        //IdMap::getInstance()->get("Customer", $obj->getID());
        //var_dump($this->idMap->add('Customer', $obj));
        //var_dump($this->findById($obj->__get('email')));
        //$this->UOW->registerNew($obj);
        //$this->UOW->commit();

        return $obj;
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


        function __construct($array) {
            foreach ($array as $key => $value) {
                $this->$key = $value;
            }
        }

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
        $obj->__set("loginStatus", 0);
        $obj->__set("isAdmin", 0);


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
    //clearallloginsessions

}
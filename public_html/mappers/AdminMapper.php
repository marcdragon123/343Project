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
            if ($userObj->__get('Password') != $post['Password']) {
                Messages::setMsg("wrong password", 'error');
                return false;
            }
            if($userObj->__get('Type')==='A'){
                $userObj = $this->_create();
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    'UserID' => $userObj->__get('UserID'),
                    'FirstName' => $userObj->__get('FirstName'),
                    'LastName' => $userObj->__get('LastName'),
                    'Email' => $userObj->__get('Email'),
                    'Type' => $userObj->__get('Type')
                );
                $userObj->__set('LoginStatus', true);
                //$this->UOW->updateDirty($userObj)
                return true;
            }
            Messages::setMsg("None Admin", 'error');
            return false;
        }
        $userObj = $this->userTDG->find($post['Email']);
        if(!is_null($userObj)){
            if($userObj['Password'] === $post['Password']){
                if($userObj['Type'] === 'A') {
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['user_data'] = array(
                        'UserID' => $userObj['UserID'],
                        'FirstName' => $userObj['FirstName'],
                        'LastName' => $userObj['LastName'],
                        'Email' => $userObj['Email'],
                        'Type' => $userObj['Type']
                    );
                    $usr = $this->create();
                    $usr = $this->populate($usr, $userObj);
                    $usr->__set('LoginStatus', true);
                    IdMap::getInstance()->add($usr, 'Admin');
                    //$this->UOW->updateDirty();
                    return true;
                }
                Messages::setMsg('Email does not possess Admin rights', 'error');
                return false;

            }
            Messages::setMsg('Wrong Password', 'error');
            return false;
        }
        Messages::setMsg('Email Does Not Exist', 'error');
            return false;
    }
    public function logout($email){
        $userObj = IdMap::getInstance()->get('Admin', $email);
        //$userObj->__set('LoginStatus', false);
        //$this->updateLoginSession($userObj);

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
        $obj->__set("Type", 'A');


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


    public function updateLoginSession(Account $admin){

        $this->UOW->registerDirty($admin);
        //$this->UOW->commit();

    }

}
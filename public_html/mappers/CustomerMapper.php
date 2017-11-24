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
    public $idMap;
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
        $this->idMap = IdMap::getInstance();
        $this->UOW = UnitOfWork::getInstance();
        $this->userTDG = new UserTDG();
    }

    /**
     * @param array $post
     * @return bool
     */
    public function login(array $post) {
/*
        $userObj = $this->idMap->get('Customer',$post['Email']);

        if(!is_null($userObj)) {
            //if found in idmap, check if password is correct
            if (!($userObj->__get('Password') === $post['Password'])) {
                Messages::setMsg("wrong password", 'error');
                return false;
            }
            //if pass is correct, check if customer
            if($userObj->__get('Type')==='C'){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    'UserID' => $userObj->__get('UserID'),
                    'FirstName' => $userObj->__get('FirstName'),
                    'LastName' => $userObj->__get('LastName'),
                    'Email' => $userObj->__get('Email'),
                    'Type' => $userObj->__get('Type')
                );
                $userObj->__set('LoginStatus', true);
                $this->updateLoginSession($userObj);
                return true;
            }
            Messages::setMsg($userObj->__get('FirstName').", login from admin page please", 'error');
        }
*/
        //if email is not in idmap, check db
        $userObj = $this->userTDG->find($post['Email']);
        if(!is_null($userObj)){
            if($userObj['Password'] === $post['Password']){
                if($userObj['Type'] === 'C') {
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['user_data'] = array(
                        'UserID' => $userObj['UserID'],
                        'FirstName' => $userObj['FirstName'],
                        'LastName' => $userObj['LastName'],
                        'Email' => $userObj['Email'],
                        'Type' => $userObj['Type']
                    );
                    $usr = $this->_create();
                    $usr = $this->populate($usr, $userObj);
                    $usr->__set('LoginStatus', true);
                    $this->updateLoginSession($usr);
                    //$this->idMap->add($usr, 'Customer');
                    return true;
                }
                Messages::setMsg('Admin login from admin page', 'error');
                return false;
            }
            Messages::setMsg('Wrong Password', 'error');
            return false;

        }
        Messages::setMsg('Email Does Not Exist', 'error');
        return false;
    }

    public function logout($email){
        $userObj = $this->idMap->get('Customer', $email);
        $userObj->__set('LoginStatus', false);
        $this->updateLoginSession($userObj);
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
        $this->idMap->add($obj, 'Customer');
        //$this->UOW->registerNew($obj);
        //$this->UOW->commit(CustomerMapper::getInstance());
        return $obj;
    }

    /**
     * @param Customer $obj
     */
    public function delete($obj)
    {
        $this->idMap->remove('Customer', $obj->__get('Email'));
        //$this->UOW->registerDeleted($obj);
    }

    /**
     * Populate the Customer (AccountObj) with
     * the data array.
     *
     * This is a very simple example, but the mapping
     * can be as complex as required.
     *
     * @param Customer $obj
     * @param array $data
     * @return Customer
     */
    public function populate($obj, array $data){

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
        $obj->__set("LoginStatus", false);
        $obj->__set("Type", 'C');


        return $obj;
    }

    /**
     * @param $arr
     * @return Customer
     */
    public function _create($arr=null){
        return new Customer();
    }

    /**
     * Insert the DomainObject in persistent storage
     *
     * This may include connecting to the database
     * and running an insert statement.
     *
     * @param Customer $obj
     */
    public function _insert($obj)
    {
        $this->userTDG->insert($obj);
    }

    /**
     * Update the DomainObject in persistent storage
     *
     * This may include connecting to the database
     * and running an update statement.
     *
     * @param Customer $obj
     */
    public function _update($obj)
    {
        $this->userTDG->update($obj);
    }

    /**
     * Delete the DomainObject from persistent storage
     *
     * This may include connecting to the database
     * and running a delete statement.
     *
     * @param Customer $obj
     */
    public function _delete($obj)
    {
        $this->userTDG->delete($obj->getID());

    }

    /**
     * @param Account $usr
     */
    public function updateLoginSession(Account $usr){
        if($usr->__get('LoginStatus')){
            $this->userTDG->loginAudit($usr);
        }
        else
            $this->userTDG->logoutAudit($usr);

    }

}
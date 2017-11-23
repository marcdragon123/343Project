<?php
/**
 * anania
 */

class MonitorMapper extends MapperAbstract {

    public $UOW;
    public $monitorTDG;
    private static $instance = null;


    public static function getInstance() {
        if (self::$instance == null)
        {
            self::$instance = new MonitorMapper();
        }

        return self::$instance;
    }

    public function __construct() {
        $this->UOW = UnitOfWork::getInstance();
        $this->monitorTDG = new MonitorTDG();
    }

    /**
     * @param array $post
     * @return bool
     */

    //Modify following to display instead of login
    /*
    public function login(array $post) {

        $userObj = IdMap::getInstance()->get('Customer',$post['Email']);

        if(!is_null($userObj)) {
            if ($userObj->__get('Password') != $post['Password']) {
                Messages::setMsg("wrong password", 'error');
                return false;
            }
            if($userObj->__get('Type')==='C'){
                $userObj = $this->_create();
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    'UserID' => $userObj->__get('UserID'),
                    'FirstName' => $userObj->__get('FirstName'),
                    'LastName' => $userObj->__get('LastName'),
                    'Email' => $userObj->__get('Email'),
                    'Type' => $userObj->__get('Type')
                );
                $this->updateLoginSession($userObj);
                return true;
            }
            Messages::setMsg($userObj['FirstName'].", login from admin page please", 'error');
            return false;
        }
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
                    $usr = $this->create();
                    $usr = $this->populate($usr, $userObj);
                    $usr->__set('LoginStatus', true);
                    IdMap::getInstance()->add($usr, 'Customer');
                    return true;
                }
                Messages::setMsg('Admin', 'error');
                return false;

            }
            Messages::setMsg('Wrong Password', 'error');
            return false;
        }
        Messages::setMsg('Email Does Not Exist', 'error');
        return false;
    }
    */

    /**
     * @param array|null $data
     * @return Monitor
     */
    public function create(array $data = null) {
        $obj = $this->_create();

        if($data){
            $obj = $this->populate($obj, $data);
        }
        ProductsIdMap::getInstance()->add($obj, 'Monitor');
        $this->UOW->registerNew($obj);
        $this->UOW->commit($this);
        return $obj;
    }

    /**
     * @param Monitor $obj
     */
    public function delete($obj) {
        $this->_delete($obj);
    }

    /**
     * Populate the Monitor (MonitorObj) with
     * the data array.
     *
     * This is a very simple example, but the mapping
     * can be as complex as required.
     *
     * @param Monitor $obj
     * @param array $data
     * @return Monitor
     */
    public function populate($obj, array $data) {

        $obj->__set("ModelNumber", $data['ModelNumber']);
        $obj->__set("DisplayDimensions", $data['DisplayDimensions']);
        $obj->__set("Brand", $data['Brand']);
        $obj->__set("Price", $data['Price']);
        $obj->__set("Weight", $data['Weight']);
        $obj->__set("SerialNumber", $data['SerialNumber']);


        return $obj;
    }

    /**
     * Create a new monitors DomainObject
     * @return Monitor
     */
    public function _create() {
        return new Monitor();
    }

    /**
     * Insert the DomainObject in persistent storage
     *
     * This may include connecting to the database
     * and running an insert statement.
     *
     * @param Monitor $obj
     */
    public function _insert($obj) {
        $this->monitorTDG->insert($obj);
        //$obj->__set('ID', $Id);
    }

    /**
     * Update the DomainObject in persistent storage
     *
     * This may include connecting to the database
     * and running an update statement.
     *
     * @param Monitor $obj
     */
    public function _update($obj) {
        $this->monitorTDG->update($obj);
    }

    /**
     * Delete the DomainObject from persistent storage
     *
     * This may include connecting to the database
     * and running a delete statement.
     *
     * @param Monitor $obj
     */
    public function _delete($obj) {
        $this->monitorTDG->delete($obj->getID());
    }

}
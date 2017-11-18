<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-16
 * Time: 9:20 AM
 */



class AccountCatalog
{
    private $accountList;

    public function __construct()
    {
        $this->accountList = Array();
    }

    public function getAccount($account) {
        $list = $this->getAccountList();

        foreach ($this->accountList as $value) {
            if($account->getID() == $value->getID()) {
                return $value;
            }
        }

        return null;
    }

    public function addAccount($account) {
        $list = $this->getAccountList();

        array_push($list, $account);
    }

    /**
     * @return mixed
     */
    public function getAccountList()
    {
        return $this->accountList;
    }

    /**
     * @param mixed $accountList
     */
    public function setAccountList($accountList)
    {
        $this->accountList = $accountList;
    }


}
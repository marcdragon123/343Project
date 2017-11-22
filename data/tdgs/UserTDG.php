<?php
/**
 * Created by PhpStorm.
 * users: ahmadbiz
 * Date: 2017-11-05
 * Time: 8:10 PM
 */

class UserTDG extends Model
{
    //public $id_field = "UserId";
    //maybe add here rest of attributes to make sqls easier to eliminate mistakes
    //and make it easier to change one to change all

    public function get($id){
        $this->query('SELECT * FROM account WHERE UserID = :id');//query goes here
        $this->bind('id', $id);
        return $this->single();
    }

    /**
     * fetch single users from DB by email
     * @param $Email
     *
     * @return array
     */
    public function find($Email) {
        $this->query('SELECT * FROM account WHERE Email = :Email');//query goes here
        $this->bind('Email', $Email);

        return $this->single();
    }

    /**
     * fetch all users from DB
     *
     * @return array users
     */
    public function findAll()
    {
        $this->query('SELECT * FROM account ORDER BY userID');
        $users = $this->resultSet();
        return $users;
    }

    /**
     * @param Account object
     * @return string
     */
    public function insert($user)
    {
        $this->query('INSERT INTO account (FirstName, LastName, Email, PhoneNumber, Password, StreetName, StreetNumber, City, Province, Country, PostalCode) 
                             VALUES(:FirstName, :LastName, :Email, :PhoneNumber, :Password , :StreetName, :StreetNumber, :City, :Province, :Country, :PostalCode)');
        $this->bind(':FirstName', $user->__get('FirstName'));
        $this->bind(':LastName', $user->__get('LastName'));
        $this->bind(':Email', $user->__get('Email'));
        $this->bind(':PhoneNumber', $user->__get('PhoneNumber'));
        $this->bind(':Password', $user->__get('Password'));
        $this->bind(':StreetName', $user->__get('StreetName'));
        $this->bind(':StreetNumber', $user->__get('StreetNumber'));
        $this->bind(':City', $user->__get('City'));
        $this->bind(':Province', $user->__get('Province'));
        $this->bind(':Country', $user->__get('Country'));
        $this->bind(':PostalCode', $user->__get('PostalCode'));

        
        $this->execute();

        
        return $this->lastInsertId();
    }

    /**
     * deletes users from DB
     * @param $id
     */
    public function delete($id)
    {
        $this->query('DELETE FROM account WHERE UserID = :id');
        $this->bind('id', $id);
        $this->execute();

        return;
    }

    /**
     * @param Account $user
     * @return string id
     */

    public function update(Account $user)
    {
        $this->query('UPDATE account SET FirstName = :FirstName, LastName = :LastName, Email = :Email, PhoneNumber = :PhoneNumber,
                            Password = :Password, StreetName = :StreetName, StreetNumber = :StreetNumber,
                            City = :City, Province = :Province, Country = :Country, PostalCode = :PostalCode) WHERE UserID = :UserID');
        $this->bind(':UserID', $user->getID());
        $this->bind(':FirstName', $user->__get('FirstName'));
        $this->bind(':LastName', $user->__get('LastName'));
        $this->bind(':Email', $user->__get('Email'));
        $this->bind(':PhoneNumber', $user->__get('PhoneNumber'));
        $this->bind(':StreetNumber', $user->__get('StreetNumber'));
        $this->bind(':StreetName', $user->__get('StreetName'));
        $this->bind(':City', $user->__get('City'));
        $this->bind(':PostalCode', $user->__get('PostalCode'));
        $this->bind(':Province', $user->__get('Province'));
        $this->bind(':Country', $user->__get('Country'));
        $this->bind(':Password', $user->__get('Password'));
        $this->execute();

        return $this->lastInsertId();
    }

    public function loginAudit(Account $user)
    {
        $this->query('INSERT INTO audit (ID, AccountID, IsActive, Login, Logout)
                                VALUES(:ID, :AccountID, :IsActive, :Login, :Logout)');
        $this->bind(':ID', $user->__get('ID'));
        $this->bind(':AccountID', $user->__get('AccountID'));
        $this->bind(':IsActive', $user->__get('IsActive'));
        $this->bind(':Login', $user->__get('Login'));
        $this->bind(':Logout', $user->__get('Logout'));
        
        $this->execute();
        
        return $this->lastInsertId();
    }

    //public function logoutAudit(Account $user){}





}

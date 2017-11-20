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
        $this->query('SELECT * FROM account WHERE UserId = :id');//query goes here
        $this->bind('id', $id);
        $userData = $this->single();

        //$users = new Account($userData);
        //better to turn everything into objects
        return $user;
    }

    /**
     * fetch single users from DB by email
     * @param $email
     *
     * @return array $userData
     */
    public function find($email) {
        $this->query('SELECT * FROM account WHERE Email = :email');//query goes here
        $this->bind('email', $email);
        $userData = $this->single();
        return $userData;
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
                             VALUES(:firstName, :lastName, :email, :phone, :password , :streetName, :streetNumber, :city, :province, :country, :postalCode)');
        $this->bind(':firstName', $user->__get('firstName'));
        $this->bind(':lastName', $user->__get('lastName'));
        $this->bind(':email', $user->__get('email'));
        $this->bind(':phone', $user->__get('phone'));
        $this->bind(':password', $user->__get('password'));
        $this->bind(':streetName', $user->__get('streetName'));
        $this->bind(':streetNumber', $user->__get('streetNumber'));
        $this->bind(':city', $user->__get('city'));
        $this->bind(':province', $user->__get('province'));
        $this->bind(':country', $user->__get('country'));
        $this->bind(':postalCode', $user->__get('postalCode'));

        $this->execute();
        
        return $this->lastInsertId();
    }

    /**
     * deletes users from DB
     * @param $id
     */
    public function delete($id)
    {
        $this->query('DELETE FROM Account WHERE UserID = :id');
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
        $this->query('UPDATE account SET FirstName = :firstName, LastName = :lastName, Email = :email, PhoneNumber = :phone,
                            Password = :password, StreetName = :streetName, StreetNumber = :streetNumber,
                            City = :city, Province = :province, Country = :country, PostalCode = :postalCode) WHERE id = :id');
        $this->bind(':id', $user->getID());
        $this->bind(':firstName', $user->__get('firstName'));
        $this->bind(':lastName', $user->__get('lastName'));
        $this->bind(':email', $user->__get('email'));
        $this->bind(':phone', $user->__get('phone'));
        $this->bind(':streetNumber', $user->__get('streetNumber'));
        $this->bind(':streetName', $user->__get('streetName'));
        $this->bind(':city', $user->__get('city'));
        $this->bind(':postalCode', $user->__get('postalCode'));
        $this->bind(':province', $user->__get('province'));
        $this->bind(':country', $user->__get('country'));
        $this->bind(':password', $user->__get('password'));
        $this->execute();

        return $this->lastInsertId();
    }



}
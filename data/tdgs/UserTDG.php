<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-11-05
 * Time: 8:10 PM
 */

class UserTDG extends Model
{

    /**
     * fetch single user from DB by email
     * @param $email
     *
     * @return array $userData
     */
    public function find($email)
    {
        $this->query('SELECT * FROM account_tbl WHERE email = :email');//query goes here
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
        $this->query('SELECT * FROM Account ORDER BY id');
        $users = $this->resultSet();
        return $users;
    }

    /**
     * @param Account object
     * @return string
     */
    public function insert(Account $user)
    {

        $this->query('INSERT INTO account_tbl (firstName, lastName, email, phone, password, streetName, streetNumber, city, province, country, postalCode) 
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
     * deletes user from DB
     * @param $id
     */
    public function delete($id)
    {
        $this->query('DELETE FROM Account WHERE id = :id');
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
        $this->query('UPDATE account SET firstName = :firstName, lastName = :lastName, email = :email, phone = :phone,
                            password = :password, street = :streetName, streetNumber = :streetNumber,
                            city = :city, province = :province, country = :country, postalCode = :postalCode) WHERE id = :id');
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
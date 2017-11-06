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
        $this->query('SELECT * FROM Account WHERE Email = :email');//query goes here
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
     * @param $post object
     * @return string
     */
    public function insert($post)
    {

        $this->query('INSERT INTO account_tbl (firstName, lastName, 
                      email, phone, password, street, streetNum, city, province,
                       country, postalCode) VALUES(:fname, :lname, :email, :phone,
                        :password , :streetname, :streetnum, :city, :Province, :Country, :postalcode)');
        $this->bind(':fname', $post['fName']);
        $this->bind(':lname', $post['lname']);
        $this->bind(':email', $post['email']);
        $this->bind(':phone', $post['phone']);
        $this->bind(':streetnum', $post['streetNum']);
        $this->bind(':streetname', $post['streetName']);
        $this->bind(':city', $post['city']);
        $this->bind(':postalcode', $post['postalCode']);
        $this->bind(':province', $post['province']);
        $this->bind(':country', $post['country']);
        $this->bind(':password', $post['password']);
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
     * @param $id
     * @param $fName
     * @param $lName
     * @param $isAdmin
     * @param $password
     * @param $email
     * @param $phone
     * @param $streetNum
     * @param $streetName
     * @param $city
     * @param $province
     * @param $postalCode
     * @param $country
     * @return string id
     */

    public function update($id, $fName, $lName, $isAdmin, $password, $email, $phone, $streetNum, $streetName,
                           $city, $province, $postalCode, $country)
    {
        $this->query('UPDATE account SET isAdmin = :isAdmin, firstName = :fname, lastName = :lname, 
                      email = :email, phone = :phone, password = :password, street = :streetName, streetNum = :streetNum,
                       city = :city, province = :province, country = :country, postalCode = :postalCode) WHERE id = :id');
        $this->bind('id', $id);
        $this->bind(':isAdmin', $isAdmin);
        $this->bind(':fname', $fName);
        $this->bind(':lname', $lName);
        $this->bind(':email', $email);
        $this->bind(':phone', $phone);
        $this->bind(':streetnum', $streetNum);
        $this->bind(':streetname', $streetName);
        $this->bind(':city', $city);
        $this->bind(':postalcode', $postalCode);
        $this->bind(':Province', $province);
        $this->bind(':Country', $country);
        $this->bind(':password', $password);
        $this->execute();

        return $this->lastInsertId();
    }



}
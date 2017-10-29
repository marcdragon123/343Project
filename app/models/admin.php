<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-10-20
 * Time: 10:58 PM
 */

class AdminModel extends Model{
    public function Index(){
        $this->query('SELECT * FROM account_tbl ORDER BY id DESC'); //query goes here
        $rows = $this->resultSet();
        return $rows;
    }

    public function adminLogin(){
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = md5($post['password']);
        $email = $post['email'];

        if($post['submit']){
            // Compare Login
            $this->query('SELECT * FROM account_tbl WHERE email = :email AND password = :password AND isAdmin = TRUE');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $row = $this->single();

            if($row){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id"	=> $row['id'],
                    "firstName"	=> $row['firstName'],
                    "email"	=> $row['email'],
                    "isAdmin" => $row['isAdmin']
                );
                $ID = $_SESSION['user_data']['ID'];
                $this->loginStatus($email, $ID);
                header('Location: '.ROOT_URL.'admin');
            } else {
                Messages::setMsg('Incorrect Login', 'error');
            }
        }
        return;
    }

    public function loginStatus($email, $ID){
        $isActive = true;
        $this->query('UPDATE account_tbl SET isActive = :isActive WHERE email = :email');
        $this->bind(':email', $email);
        $this->bind(':isActive', $isActive);
        $this->execute();

        $this->query('INSERT INTO audit_tbl (accountID, login) VALUES (:id, CURRENT_TIMESTAMP )');
        $this->bind(':id', $ID);
        $this->execute();

    }

    public function logoutStatus($email, $ID){
        $isActive = false;
        $this->query('UPDATE account_tbl SET isActive = :isActive WHERE email = :email');
        $this->bind(':email', $email);
        $this->bind(':isActive', $isActive);
        $this->execute();

        $out = null;
        $this->query('UPDATE audit_tbl SET logout=CURRENT_TIMESTAMP WHERE accountID = :id AND logout IS NULL');
        $this->bind(':id', $ID);
        $this->execute();
    }

    public function userProfile(){
        return;
    }

}
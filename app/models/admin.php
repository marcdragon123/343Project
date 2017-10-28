<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-10-20
 * Time: 10:58 PM
 */

class AdminModel extends Model{
    public function Index(){
        $this->query('SELECT * FROM account_tbl ORDER BY ID DESC'); //query goes here
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
            $this->query('SELECT * FROM account WHERE Email = :email AND Password = :password AND Admin = TRUE');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $row = $this->single();

            if($row){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "account_ID"	=> $row['account_ID'],
                    "FirstName"	=> $row['FirstName'],
                    "Email"	=> $row['Email'],
                    "Admin" => $row['Admin']
                );
                $ID = $_SESSION['user_data']['account_ID'];
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
        $this->query('UPDATE account SET isActive = :isActive WHERE Email = :email');
        $this->bind(':email', $email);
        $this->bind(':isActive', $isActive);
        $this->execute();

        $this->query('INSERT INTO audit (account_ID, Login) VALUES (:ID, CURRENT_TIMESTAMP )');
        $this->bind(':ID', $ID);
        $this->execute();

    }

    public function logoutStatus($email, $ID){
        $isActive = false;
        $this->query('UPDATE account SET isActive = :isActive WHERE Email = :email');
        $this->bind(':email', $email);
        $this->bind(':isActive', $isActive);
        $this->execute();

        $out = null;
        $this->query('UPDATE audit SET Logout=CURRENT_TIMESTAMP WHERE account_ID = :ID AND Logout IS NULL');
        $this->bind(':ID', $ID);
        $this->execute();
    }

    public function userProfile(){
        return;
    }

}
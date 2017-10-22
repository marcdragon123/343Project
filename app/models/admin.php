<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-10-20
 * Time: 10:58 PM
 */

class AdminModel extends Model{
    public function adminLogin(){
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = md5($post['password']);
        $email = $post['email'];

        if($post['submit']){
            // Compare Login
            $this->query('SELECT * FROM account_tbl WHERE Email = :email AND password = :password AND isAdmin = TRUE');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $row = $this->single();

            if($row){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "ID"	=> $row['ID'],
                    "FirstName"	=> $row['FirstName'],
                    "Email"	=> $row['email']
                );
                $ID = $_SESSION['user_data']['ID'];
                $this->loginStatus($email, $ID);
                header('Location: '.ROOT_URL.'home');
            } else {
                Messages::setMsg('Incorrect Login', 'error');
            }
        }
        return;
    }

    public function loginStatus($email, $ID){
        $isActive = true;
        $this->query('UPDATE account_tbl SET isActive = :isActive WHERE Email = :email');
        $this->bind(':email', $email);
        $this->bind(':isActive', $isActive);
        $this->execute();

        $this->query('INSERT INTO audit_tbl (AccountID, Login) VALUES (:ID, CURRENT_TIMESTAMP )');
        $this->bind(':ID', $ID);
        $this->execute();

    }

    public function logoutStatus($email, $ID){
        $isActive = false;
        $this->query('UPDATE account_tbl SET isActive = :isActive WHERE Email = :email');
        $this->bind(':email', $email);
        $this->bind(':isActive', $isActive);
        $this->execute();

        $out = null;
        $this->query('UPDATE audit_tbl SET Logout=CURRENT_TIMESTAMP WHERE AccountID = :ID AND Logout IS NULL');
        $this->bind(':ID', $ID);
        $this->execute();
    }


}
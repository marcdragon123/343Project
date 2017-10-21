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
                header('Location: '.ROOT_URL.'home');
            } else {
                Messages::setMsg('Incorrect Login', 'error');
            }
        }
        return;
    }

}
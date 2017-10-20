<?php
class UserModel extends Model{
	public function register(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $isAdmin = 0;
		$password = md5($post['password']);

		if($post['submit']){


			// Insert into MySQL
			$this->query('INSERT INTO Account_tbl (isAdmin, FirstName, LastName, 
                          Email, PhoneNumber, password, StreetName, StreetNumber, City, Province,
                           Country, PostalCode) VALUES(:isAdmin, :fname, :lname, :email, :phone,
                            :password , :streetname, :streetnum, :city, :Province, :Country, :postalcode)');
            $this->bind(':isAdmin', $isAdmin);
			$this->bind(':fname', $post['fname']);
            $this->bind(':lname', $post['lname']);
            $this->bind(':email', $post['email']);
            $this->bind(':phone', $post['phone']);
            $this->bind(':streetnum', $post['streetnum']);
			$this->bind(':streetname', $post['streetname']);
            $this->bind(':city', $post['city']);
            $this->bind(':postalcode', $post['postalcode']);
            $this->bind(':Province', $post['Province']);
            $this->bind(':Country', $post['Country']);
			$this->bind(':password', $password);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'users/login');
			}
		}
		return;
	}

	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){
			// Compare Login
			$this->query('SELECT * FROM Account_tbl WHERE Email = :email AND password = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			
			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"ID"	=> $row['id'],
					"FirstName"	=> $row['name'],
					"Email"	=> $row['email']
                );
				header('Location: '.ROOT_URL.'home');
			} else {
				Messages::setMsg('Incorrect Login', 'error');
			}
		}
		return;
	}

	public function viewProile(){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        if($get){

        }
    }
}
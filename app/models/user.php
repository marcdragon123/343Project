<?php
class UserModel extends Model{
	public function register(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $isAdmin = 1;
		$password = md5($post['password']);

		if($post['submit']){

		    //need a function here to check if email already exists

            // Insert into MySQL
            $this->query('INSERT INTO account_tbl (isAdmin, FirstName, LastName, 
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
            if ($this->lastInsertId()) {
                // Redirect
                header('Location: ' . ROOT_URL . 'users/login');
            }
		}
		return;
	}

	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);
		$email = $post['email'];
		$isActive = true;

		if($post['submit']){
			// Compare Login
			$this->query('SELECT * FROM account_tbl WHERE Email = :email AND password = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);

			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"ID"	=> $row['ID'],
					"FirstName"	=> $row['FirstName'],
					"Email"	=> $row['Email']
                );
				$ID = $_SESSION['user_data']['ID'];
				$this->loginStatus($email, $ID);
                header('Location: '.ROOT_URL.'home');
            }
			else {
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

    //checks if user already has a regular user account

	public function viewProile(){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        if($get){

        }
    }
}
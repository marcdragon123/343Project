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
            $this->query('INSERT INTO account (Admin, FirstName, LastName, 
                      Email, PhoneNumber, Password, StreetName, StreetNumber, City, Province,
                       Country, PostalCode) VALUES(:isAdmin, :firstName, :lastName, :email, :phone,
                        :password , :streetName, :streetNumber, :city, :province, :country, :postalCode)');
            $this->bind(':isAdmin', $isAdmin);
            $this->bind(':firstName', $post['firstName']);
            $this->bind(':lastName', $post['lastName']);
            $this->bind(':email', $post['email']);
            $this->bind(':phone', $post['phone']);
            $this->bind(':streetNumber', $post['streetNumber']);
            $this->bind(':streetName', $post['streetName']);
            $this->bind(':city', $post['city']);
            $this->bind(':postalCode', $post['postalCode']);
            $this->bind(':province', $post['province']);
            $this->bind(':country', $post['country']);
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
			$this->query('SELECT * FROM account WHERE Email = :email AND password = :password');
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
	    $this->query('UPDATE account SET isActive = :isActive WHERE Email = :email');
	    $this->bind(':email', $email);
	    $this->bind(':isActive', $isActive);
	    $this->execute();

	    $this->query('INSERT INTO audit (account_ID, Login) VALUES (:account_ID, CURRENT_TIMESTAMP )');
	    $this->bind(':account_ID', $ID);
	    $this->execute();

    }

    public function logoutStatus($email, $ID){
	    $isActive = false;
        $this->query('UPDATE account SET isActive = :isActive WHERE Email = :email');
        $this->bind(':email', $email);
        $this->bind(':isActive', $isActive);
        $this->execute();

        $out = null;
        $this->query('UPDATE audit SET Logout=CURRENT_TIMESTAMP WHERE account_ID = :account_ID AND Logout IS NULL');
        $this->bind(':account_ID', $ID);
        $this->execute();
    }

    //checks if user already has a regular user account

	public function viewProile(){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

        if($get){

        }
    }
    public function userProfile(){
        return;
    }
}
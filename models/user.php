<?php 
/**
 * 
 */
include'db.php';

class User
{
	private $fname;
	private $lname;
	private $email;
	private $password;
	private $password2;
	private $db;

	//construct login
	function __construct($email,$password)
	{
		$this->email = $email;
		$this->password = $password;
	}

	//construct registration
	function __constructR($fname,$lname,$email,$password,$password2)
	{
		$this->fname = $fname;
		$this->lname = $lname;
		$this->email = $email;
		$this->password = $password;
		$this->password2 = $password2;
	}
	
	function validateDataLogin(){
		
		$this -> email = strtolower(stripslashes(strip_tags(htmlentities($this -> email))));
		$this -> password = stripslashes(strip_tags(htmlentities($this -> password)));

		if(!is_numeric($this -> email) && strlen($this -> email) > 14 && strlen($this -> email) < 31 ){
			if (strlen($this->password)>5 && strlen($this->password)<13 ) {
				return true;
			}else{

				return "Error, password length must be between 6 and 12";
				
			}
		}
		else
		{
			return "Error, email lenght must be between 15 and 30";
		}

	}

	function validateData(){
		//validate the data 
		//if it is a strings 
		//stripslashes(), strip_tags(), and htmlentities()
		$this->fname = strtolower(stripslashes(strip_tags(htmlentities($this->fname))));
		$this->lname = strtolower(stripslashes(strip_tags(htmlentities($this->lname))));
		$this->email = strtolower(stripslashes(strip_tags(htmlentities($this->email))));
		$this->password = stripslashes(strip_tags(htmlentities($this->password)));

		//validate size of all input data and if they are strings or not
		if (!is_numeric($this->fname) && strlen($this->fname)>3 && strlen($this->fname)<18) {
			if (!is_numeric($this->lname) && strlen($this->lname)>3 && strlen($this->lname)<18) {
				if (!is_numeric($this->email) && strlen($this->email)>14 && strlen($this->email)<31) {
					if (strlen($this->password)>5 && strlen($this->password)<13 && $this->password==$this->password2) {
						return true;
					}else{
						if ($this->password==$this->password2) {
							return "Error, password lenght must be between 6 and 12";
						}else{
							return "Error, passwords doesnt match! ";
						}
						
					}
				}else{
					return "Error, email lenght must be between 15 and 30";
				}
			}else{
				return "Error, lastName must be letter a-z and lenght between 4 and 17";
			}
		}else{
			return "Error, firstName must be letter a-z and lenght between 4 and 17";
		}
	}

	function validateDataDB(){
		require_once 'db_Info.php';
		$connection = new DataBase($hostname,$username,$password);
		if (!is_null($connection->connectToHOSTDB())) {
			if (!is_null($connection->connectToDB($database))) {
				$this->db = $connection->getDB();
				return TRUE;
			}else{
				return "Problem connection to DB";
			}
		}else{
			return "Problem connection to hostDB";
		}
	}

	function insertDataDB(){

		//validate sqlInjection
		$this->fname = mysqli_real_escape_string($this->db,$this->fname);
		$this->lname = mysqli_real_escape_string($this->db,$this->lname);
		$this->password = mysqli_real_escape_string($this->db,$this->password);
		//password encryted
		$this->password = base64_encode(password_hash($this->password, PASSWORD_BCRYPT, ["cost" => 10]));

		$query = "INSERT INTO users (FirstName, LastName, userName, Password) VALUES ('".$this->fname."','".$this->lname."','".$this->email."','".$this->password."');";

	    $invokeQuery = $this->db->query($query);

	    $this->db->close();
	    
	    if ($invokeQuery === FALSE){
	    	//no user in db
	    	return FALSE;
	    }
	    else{
	    	//there is an user in the db
	    	//start session variable
	    	session_start();
	    	$_SESSION['email'] = $this->email;
	    	$_SESSION['name'] = $this->fname;
	    	$_SESSION['password'] = $this->password;
	    	$_SESSION['lives'] = 6;
	    	$_SESSION['level'] = 1;
	    	return TRUE;
	    } 
	}

	function loginDataDB(){

		//validate sqlInjection
		$query = "SELECT * FROM users WHERE userName ='".$this->email."';";
		$invokeQuery = $this->db->query($query);

		$each_row = $invokeQuery->fetch_array(MYSQLI_ASSOC);

		$pwd_peppered = base64_decode($each_row['Password']);

		if (password_verify($this->password,$pwd_peppered)) {
			//user and password match
	    	//start session variable
	    	session_start();
	    	$_SESSION['email'] = $this->email;
	    	$_SESSION['name'] = $each_row['FirstName'];
	    	$_SESSION['password'] = $pwd_peppered;
	    	$_SESSION['lives'] = 6;
	    	$_SESSION['level'] = 1;
		    return TRUE;
		}
		else {
		    return FALSE;
		}
	}

	function compareData(){
		//Execute the query

		//validate sqlInjection
		$this->email = mysqli_real_escape_string($this->db,$this->email);

		$query = "SELECT * FROM users WHERE userName ='".$this->email."';";
	    $invokeQuery = $this->db->query($query);

	    if ($invokeQuery->num_rows==0){
	    	//no user in db
	        return FALSE;
	    }
	    else{
	    	//there is an user in the db
	    	return TRUE;
	    } 
	}
}

	function logOut(){
		session_start();
		 if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}

		// Finally, the session is destroy
		session_destroy();
	}



?>
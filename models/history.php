<?php 
/**
 * 
 */
class History
{
	private $db;
	private $text;
	function __construct(argument)
	{
		// code...
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
	    	$_SESSION['LOGIN_STATUS'] = true;
	    	$_SESSION['lives'] = 6;
	    	$_SESSION['level'] = 1;
	    	return TRUE;
	    } 
	}
}
?>
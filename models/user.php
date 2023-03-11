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

	function __construct($fname,$lname,$email,$password,$password2)
	{
		$this->fname = $fname;
		$this->lname = $lname;
		$this->email = $email;
		$this->password = $password;
		$this->password2 = $password2;
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

		$query = "INSERT INTO users (FirstName, LastName, userName, Password) VALUES ('".$this->fname."','".$this->lname."','".$this->email."','".$this->password."');";

	    $invokeQuery = $this->db->query($query);
	    $this->db->close();
	    if ($invokeQuery === FALSE){
	    	//no user in db
	    	return FALSE;
	    }
	    else{
	    	//there is an user in the db
	    	return TRUE;
	    } 
	}

	function compareData($type){
		//Execute the query
		//type = 1 = insert
		//type = 2 = login

		//validate sqlInjection
		$this->email = mysqli_real_escape_string($this->db,$this->email);
		$this->password = mysqli_real_escape_string($this->db,$this->password);

		$query = ($type==1) ? "SELECT * FROM users WHERE userName ='".$this->email."';" : "SELECT * FROM users WHERE userName ='".$this->email."' AND Password='".$this->password."';";
	    $invokeQuery = $this->db->query($query);
	    
	    if ($type==2) {
    		$this->db->close();
    	}

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

?>
<?php 
/**
 * 
 */
class History
{
	private $db;
	private $result;
	private $lives;
	private $userId;
	private $pass;

	function __construct($result, $lives, $userId,$pass)
	{
		$this->result = $result;
		$this->lives = $lives;
		$this->userId = $userId;
		$this->pass = $pass;
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
		$this->result = mysqli_real_escape_string($this->db,$this->result);
		$this->lives = mysqli_real_escape_string($this->db,$this->lives);
		$this->userId = mysqli_real_escape_string($this->db,$this->userId);
		$this->pass = mysqli_real_escape_string($this->db,$this->pass);

		if ($this->verifyUserBefore() == TRUE) {
			$query = "INSERT INTO historypage (result, lives, userId) VALUES ('".$this->result."','".$this->lives."','".$this->userId."');";

		    $invokeQuery = $this->db->query($query);

		    $this->db->close();

		    if ($invokeQuery === FALSE){
		    	//no user in db
		    	return FALSE;
		    }
		    else{
		    	//there is an user in the db
		    	//start session variable
		    	//session_start();
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

	function verifyUserBefore(){

		//validate sqlInjection
		$query = "SELECT * FROM users WHERE userName ='".$this->userId."';";
		$invokeQuery = $this->db->query($query);

		$each_row = $invokeQuery->fetch_array(MYSQLI_ASSOC);

		$pwd_peppered = base64_decode($each_row['Password']);

		if (password_verify($this->pass,$pwd_peppered)) {
			return TRUE;
		}
		else {
		    return FALSE;
		}
	}

}
?>
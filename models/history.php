<?php 
/**
 * 
 */
include'db.php';
class History
{
	private $db;
	private $result;
	private $lives;
	private $level;
	private $user;
	private $userId;
	private $pass;

	function __construct($user = null, $result = null, $lives = null,$pass = null,$level = null)
	{
		$this->result = $result;
		$this->lives = $lives;
		$this->user = $user;
		$this->pass = $pass;
		$this->level = $level;
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
		$this->level = mysqli_real_escape_string($this->db,$this->level);

		if ($this->verifyUserBefore() == TRUE) {
			$query = "INSERT INTO historypage (result, lives, userId,level) VALUES ('".$this->result."',".$this->lives.",'".$this->userId."',".$this->level.");";
			
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
		    	$_SESSION['LOGIN_STATUS'] = true;
		    	$_SESSION['lives'] = 6;
		    	$_SESSION['level'] = 1;
		    	return TRUE;
		    }
		}
		
	}

	function verifyUserBefore(){

		//validate sqlInjection
		$query = "SELECT * FROM users WHERE userName ='".$this->user."';";
		$invokeQuery = $this->db->query($query);

		$each_row = $invokeQuery->fetch_array(MYSQLI_ASSOC);

		$pwd_peppered = base64_decode($each_row['Password']);
		
		if (password_verify($this->pass,$pwd_peppered)) {
			$this->userId = $each_row['id'];
			return TRUE;
		}
		else {
		    return FALSE;
		}
	}


	function GetHistoryData(){

		//validate sqlInjection
		$query = "SELECT historypage.id, historypage.date, historypage.result, historypage.lives, historypage.userId, historypage.level  FROM historypage JOIN users ON users.id = historypage.userId WHERE userName ='".$this->user."';";
		$invokeQuery = $this->db->query($query);
		$table = "<caption>History of user</caption>
				  <thead>
		  			<tr>
						<th scope='col'>ID</th>
						<th scope='col'>Date</th>
						<th scope='col'>Result</th>
						<th scope='col'>Lives</th>
						<th scope='col'>UserId</th>
						<th scope='col'>Level</th>
		  			</tr>
				</thead>
				<tbody>";
				
		if($invokeQuery->num_rows > 0){
			while($row = $invokeQuery->fetch_assoc()){
	
				$table = $table . "<tr>
				<td>". $row["id"] ."</td>
				<td>". $row["date"] ."</td>
				<td>". $row["result"] ."</td>
				<td>". $row["lives"] ."</td>
				<td>". $row["userId"] ."</td>
				<td>". $row["level"] ."</td>
				</tr>";
			}
		}

		$table = $table . "</tbody>";

		return $table;
		
	
	}

}
?>
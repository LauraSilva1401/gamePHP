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
	private $db;

	function __construct($fname,$lname,$email,$password)
	{
		$this->fname = $fname;
		$this->lname = $lname;
		$this->email = $email;
		$this->password = $password;
	}

	function validateData(){
		//validate the data 
		//if it is a strings 
		//if it is not a query
		//stripslashes(), strip_tags(), and htmlentities()
		return true;
	}

	function validateDataDB(){
		require_once 'db_Info.php';
		$connection = new DataBase($hostname,$username,$password);
		if (!is_null($connection->connectToHOSTDB())) {
			if (!is_null($connection->connectToDB($database))) {
				$this->db = $connection->getDB();
			}else{
				//error al conectar a bd
			}
		}else{
			//error al conectar al host de la db
		}
	}

	function insertDataDB(){

	}

	function compareData(){
		
	}
}

?>
<?php 
	/**
	 * 
	 */
	class DataBase
	{
		private $host;
		private $user;
		private $password;
		private $db;

		function __construct($host,$user,$password)
		{
			$this->host = $host;
			$this->user = $user;
			$this->password = $password;
		}

		function connectToHOSTDB(){
		    //$messages=messages();
		    //Attempt to connect to MySQL using MySQLi
		    $connection = new mysqli($this->host, $this->user, $this->password);
		    //If connection to the MySQL failed save the system error message 
		    if ($connection->connect_error){
		        //mySQLiError(mysqli_connect_error());
		        return FALSE;
		    }
		    $this->db = $connection;
		    return TRUE;
		}

		function connectToDB( $database){
		    //Attempt to connect to the Database
		    $connectionDB = mysqli_select_db($this->db, $database);
		    //If connection to the Database failed save the system error message 
		    if ($connectionDB === FALSE) {
		        //mySQLiError($connectionDBMS->error);
		        return FALSE;
		    }
		    return TRUE;
		}

		function getDB(){
			return $this->db;
		}

		function disconnectHOSTDB($connection){
		    $this->db=$connection->close();
		    if($this->db === FALSE){
		        //mySQLiError($connection->error);
		        return FALSE;
		    }
		    return TRUE;
		}
	}
?>
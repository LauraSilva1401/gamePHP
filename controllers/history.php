<?php 
require_once '../models/history.php';
session_start();
$result = ($_SESSION['LOGIN_STATUS'] == FALSE) ?"WON":"LOSE";
$lives = $_SESSION['lives'];
$level = $_SESSION['level'];
$userId = $_SESSION['email'];
$pass = $_SESSION['password'];
$logout = new History($result, $lives, $userId,$pass,$level);
$ans = $logout->validateDataDB();

if ($ans === true) {

	$ans = $logout -> insertDataDB();

	if($ans === true)
	{
		echo $ans;
	}
	else
	{
		echo $ans;
	}
}
else
{
	echo $ans;
}



?>
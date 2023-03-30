<?php 
require_once '../models/history.php';

if (session_status()) {
	if (!isset($_SESSION["level"])) {
		session_start();
	}
}
//session_start();
$result = ($_SESSION['LOGIN_STATUS'] == FALSE) ?"WON":"LOSE";
$lives = $_SESSION['lives'];
$level = $_SESSION['level'];
$userId = $_SESSION['email'];
$pass = $_SESSION['password'];

if (isset($_POST["type"])) {
	$type = $_POST["type"];
	if ($type == 1) { 
		$logout = new History( $userId, $result, $lives,$pass,$level);
		$ans = $logout->validateDataDB();

		if ($ans === true) {

			$ans = $logout -> insertDataDB();

			if($ans === true)
			{
				echo $ans;
			}else{
				echo $ans;
			}

		}else {
			echo $ans;
		}
	
	}elseif ($type == 2) {
		// aca llama tus funciones del model

		$historyPage = new History($userId);

		$ans = $historyPage -> validateDataDB();

		if ($ans === true) {

			$ans = $historyPage -> GetHistoryData();

			echo $ans;

		} else {

			echo $ans;
		}






	}

}
	


?>
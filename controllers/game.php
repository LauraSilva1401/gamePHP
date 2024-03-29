<?php 
require_once '../models/levels.php';
if (session_status()) {
	if (!isset($_SESSION["level"])) {
		session_start();
	}
}
if (isset($_POST["Type"])) {
	$type = $_POST["Type"];
	if ($type==1) {
		$data = new Levels();
		$ans = "";
		
		if ($_SESSION["level"] == 1 || $_SESSION["level"] == 2 || $_SESSION["level"] == 5) {
			$ans = $data->get_stringValue();
		}elseif ($_SESSION["level"] == 3 || $_SESSION["level"] == 4 || $_SESSION["level"] == 6) {
			$ans = $data->get_numberValue(); 
		}
		echo $ans;
	}else{
		if (isset($_POST["Answer"])) {
			$answer = $_POST["Answer"];
			$real = $_POST["Real"];
			if ($_SESSION["lives"]>0 && $_SESSION["LOGIN_STATUS"] == TRUE) {
				$level = new Levels($answer,$real);
				if ($_SESSION["level"] == 1) {
					$ans = $level->validate_level_ascending();
					if ($ans === TRUE) {
						$_SESSION["level"] = 2;
						echo $ans;
					}else{
						$arrayAns = array("ans"=>$ans,"lives"=>$_SESSION["lives"] );
						echo json_encode($arrayAns);
					}
				}elseif ($_SESSION["level"] == 2) {
					$ans = $level->validate_level_descending();
					if ($ans === TRUE) {
						$_SESSION["level"] = 3;
						echo $ans;
					}else{
						$arrayAns = array("ans"=>$ans,"lives"=>$_SESSION["lives"] );
						echo json_encode($arrayAns);
					}
				}elseif ($_SESSION["level"] == 3) {
					$ans = $level->validate_level_ascending();
					if ($ans === TRUE) {
						$_SESSION["level"] = 4;
						echo $ans;
					}else{
						$arrayAns = array("ans"=>$ans,"lives"=>$_SESSION["lives"] );
						echo json_encode($arrayAns);
					}
				}elseif ($_SESSION["level"] == 4) {
					$ans = $level->validate_level_descending();
					if ($ans === TRUE) {
						$_SESSION["level"] = 5;
						echo $ans;
					}else{
						$arrayAns = array("ans"=>$ans,"lives"=>$_SESSION["lives"] );
						echo json_encode($arrayAns);
					}
				}elseif ($_SESSION["level"] == 5) {
					$ans = $level->validate_level_min_max();
					if ($ans === TRUE) {
						$_SESSION["level"] = 6;
						echo $ans;
					}else{
						$arrayAns = array("ans"=>$ans,"lives"=>$_SESSION["lives"] );
						echo json_encode($arrayAns);
					}
				}elseif ($_SESSION["level"] == 6) {
					$ans = $level->validate_level_min_max();
					if ($ans === TRUE) {
						$_SESSION["LOGIN_STATUS"] = FALSE;
						echo $ans;
					}else{
						$arrayAns = array("ans"=>$ans,"lives"=>$_SESSION["lives"] );
						echo json_encode($arrayAns);
					}
				}
				/*
				//aca validar history
				if ($_SESSION["LOGIN_STATUS"] == FALSE || $_SESSION["lives"]==0) {
					require_once '../models/history.php';
					$result = ($_SESSION['LOGIN_STATUS'] == FALSE) ?"WON":"LOSE";
					$lives = $_SESSION['lives'];
					$level = $_SESSION['level'];
					$userId = $_SESSION['email'];
					$pass = $_SESSION['password'];
					$logout = new History($result, $lives, $userId,$pass,$level);
					$ans = $logout->validateDataDB();
					$ans = $logout -> insertDataDB();
				}
				*/
			}else{
				if ($_SESSION["lives"]>0 && $_SESSION["LOGIN_STATUS"] == TRUE){
					$ans = "Sorry you dont have more lives, restart the game";
					$arrayAns = array("ans"=>$ans,"lives"=>$_SESSION["lives"] );
					echo json_encode($arrayAns);
				}else{
					$ans = "The game is over";
					$arrayAns = array("ans"=>$ans,"lives"=>$_SESSION["lives"] );
					echo json_encode($arrayAns);
				}
			}
		}
	}
}

	

?>
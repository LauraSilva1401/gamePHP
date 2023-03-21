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
			if ($_SESSION["lives"]>0) {
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
				}
			}else{
				echo "Sorry you dont have more lives, restart the game";
			}
		}
	}
}

	

?>
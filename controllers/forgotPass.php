<?php 
require_once '../models/user.php';

$email = $_POST['Email'];
$password = $_POST['Password'];

$createNewPass = new User($email,$password);

$ans = $createNewPass->validateDataLogin();

if ($ans === true) {
	if ($ans === true){
		$ans = $createNewPass -> validateDataDB();
		if ($ans === true) {

			$ans = $createNewPass -> compareData();

			if($ans === true)
			{
				// user exists
				$ans = $createNewPass -> loginDataDB();
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
	}
	else
	{
		echo $ans;
	}
}else{
	echo $ans;
}

?>
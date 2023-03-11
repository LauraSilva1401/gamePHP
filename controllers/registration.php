<?php 
require_once '../models/user.php';
$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$password2 = $_POST['Password2'];

$login = new User($fname,$lname,$email,$password,$password2);
$ans = $login->validateData();
if ($ans === true) {
	$ans = $login->validateDataDB();
	if ($ans === true) {
		$ans = $login->compareData(1);
		if ($ans === false) {
			// user doesnt exist so we can add it
			$ans = $login->insertDataDB();
			echo $ans;
		}
	}else{
		echo $ans;
	}
}else{
	echo $ans;
}

?>
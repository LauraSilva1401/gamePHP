<?php 
require_once '../models/user.php';
$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$password2 = $_POST['Password2'];

$login = new User($email,$password,$password2,$fname,$lname);
$ans = $login->validateData();
if ($ans === true) {
	$ans = $login->validateDataDB();
	if ($ans === true) {
		$ans = $login->compareData();
		if ($ans === false) {
			// user doesnt exist so we can add it
			$ans = $login->insertDataDB();
			echo $ans;
		}else{
			echo "Error, there is an user already registrated with this email!";
		}
	}else{
		echo $ans;
	}
}else{
	echo $ans;
}

?>
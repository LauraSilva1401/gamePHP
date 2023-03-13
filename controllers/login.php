<?php 
require_once '../models/user.php';

$email = $_POST['Email'];
$password = $_POST['Password'];

$login = new User($email,$password);
$ans = $login->validateDataLogin();

if ($ans === true) {
	$ans = $login->compareData();
	if ($ans === false) {
		// user exists
		$ans = $login->loginDataDB();
		echo $ans;
	}
}else{
	echo $ans;
}

?>

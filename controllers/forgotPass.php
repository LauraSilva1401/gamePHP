<?php 
require_once '../models/user.php';

$email = $_POST['Email'];
$password = $_POST['Password'];
$password2 = $_POST['Password2'];


$createNewPass = new User($email,$password, $password2);

$ans = $createNewPass->validateDataResetPassword();

if ($ans === true) {
    $ans = $createNewPass -> validateDataDB();
    if ($ans === true) {

        $ans = $createNewPass -> compareData();

        if($ans === true)
        {
            // user exists
            $ans = $createNewPass -> updatePasswordDB();
            
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
}else{
	echo $ans;
}

?>
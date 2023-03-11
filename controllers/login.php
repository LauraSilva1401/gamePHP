<?php 
require_once '../models/user.php';

$email = $_POST['Email'];
$password = $_POST['Password'];

$login = new User($email,$password);
echo $login->validateData();

?>
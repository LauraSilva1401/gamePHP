<?php 
$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$login = new User($fname,$lname,$email,$password);
echo $login->validateData();
?>
<?php 
require_once '../models/user.php';

$logout = new User();
$logout->logOut();
?>
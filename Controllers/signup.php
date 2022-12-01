<?php

require_once('../Models/database.php');
require_once('../Models/user_db.php');

if (!empty($_POST['phoneNumber'])&&!empty($_POST['address'])&&!empty($_POST['firstName'])&&!empty($_POST['lastName'])&&!empty($_POST['password'])) {
	registerUser($_POST['email'], $_POST['phoneNumber'], $_POST['address'], $_POST['firstName'], $_POST['lastName'], $_POST['password']);
	header('Location: ../Views/login.php');
}
else {
	$error_signup = true;
	include_once("../Views/signup.php");
}
?>
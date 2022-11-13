<?php

require_once('../Models/database.php');
require_once('../Models/user_db.php');

if (validateLogin($_POST['email'], $_POST['password'])) {
	$userId = getUserId($_POST['email']);
	$lifetime = 60 * 60 * 24 * 30;    // 30 days in seconds
	session_set_cookie_params($lifetime, '/');
	session_start();
	$_SESSION['userId'] = $userId['userID'];
	header('Location: ../index.php');
	

	//session_start();
	//$_SESSION['loggedin'] = true;
	//$_SESSION['userId'] = getUserId($_POST['email']);
	
}
else {
	$error_login = 'Invalid!';
	include_once("../Views/login.php");
}
?>
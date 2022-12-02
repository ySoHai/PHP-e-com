<?php
require_once('../Models/database.php');
require_once('../Models/user_db.php');

if (!empty($_POST['phoneNumber'])&&!empty($_POST['address'])&&!empty($_POST['firstName'])&&!empty($_POST['lastName'])&&!empty($_POST['password'])&&UserDB::registerUser($_POST['email'], $_POST['phoneNumber'], $_POST['address'], $_POST['firstName'], $_POST['lastName'], $_POST['password'])) {
	if (session_status() === PHP_SESSION_NONE) {
		$lifetime = 60 * 60 * 24 * 1;    // 1 days in seconds
		session_set_cookie_params($lifetime, '/');
		session_start();
	 }
	$_SESSION['userId'] = UserDB::getUserId($_POST['email']);
	header('Location: ../Views/account.php');
	die('Something went very wrong :(');
}
else {
	$error_signup = true;
	include_once("../Views/signup.php");
}
?>
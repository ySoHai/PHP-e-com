<?php
require_once('../Models/database.php');
require_once('../Models/user_db.php');

if (UserDB::validateLogin($_POST['email'], $_POST['password'])) {
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
	$error_login = true;
	include_once("../Views/login.php");
}
?>
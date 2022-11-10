<?php

require_once('../Models/database.php');
require_once('../Models/user_db.php');

if (validateLogin($_POST['email'], $_POST['password'])) {
	include_once("Location: ../Views/index.php");
}
else {
	$error_login = 'Invalid!';
	include_once("Location: ../Views/login.php");
}
?>
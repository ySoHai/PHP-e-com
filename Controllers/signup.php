<?php

require_once('../Models/database.php');
require_once('../Models/user_db.php');

registerUser($_POST['email'], $_POST['phoneNumber'], $_POST['address'], $_POST['firstName'], $_POST['lastName'], $_POST['password']);
include_once("../Views/index.php");
?>
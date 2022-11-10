<?php

require_once('../Models/database.php');
require_once('../Models/user_db.php');

if (validateLogin($_POST['email'], $_POST['password'])) {
	echo 'OK';
}
else {
	echo 'NO';
}
?>
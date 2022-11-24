<?php

require_once('../Models/database.php');
require_once('../Models/product_db.php');


if (!empty($_POST['prodName']) && !empty($_POST['prodDesc']) && !empty($_POST['price']) && !empty($_POST['quantity']) && !empty($_POST['shipDays'])) {
	addProduct($_POST['prodName'], $_POST['prodDesc'], $_POST['price'], $_POST['quantity'], $_POST['quality'], $_POST['shipDays'], $_POST['category'], $_SESSION['userID']);
	header('Location: ../Views/addlisting.php');
}
else {
	$error_listing = 'Invalid data!';
	include_once("../Views/addlisting.php");
}
?>
<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
 }

if(!isset($_SESSION['userId'])){
	header("Location: ../Views/login.php");
	die('Something went very wrong :(');
}

require_once('../Models/database.php');
require_once('../Models/product_db.php');

if (!empty($_POST['prodName']) && !empty($_POST['prodDesc']) && !empty($_POST['price']) && !empty($_POST['quantity']) && isset($_POST['quality']) &&!empty($_POST['shipDays']) && !empty($_POST['category'])) {
	ProductDB::addProduct($_POST['prodName'], $_POST['prodDesc'], $_POST['price'], $_POST['quantity'], $_POST['quality'], $_POST['shipDays'], $_POST['category'], ((int)$_SESSION['userId']));
	header('Location: ../Views/account.php');
}
else {
	$error_listing = 'Invalid data!';
	include_once("../Views/addlisting.php");
}
?>
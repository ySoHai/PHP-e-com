<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}

$action = $_GET['action'];

require_once('../Models/database.php');
require_once('../Models/product.php');
require_once('../Models/product_db.php');
require_once('../Models/order_db.php');

if ($action=='remove'&&isset($_GET['index'])) {
	$_SESSION['cart'][$_GET['index']]=[];
	unset($_SESSION['cart'][$_GET['index']]);
}
else if ($action=='add'&&isset($_GET['item'])) {
	$product = ProductDB::get_product_by_id($_GET['item']);
	foreach ($_SESSION['cart'] as $index => $item) {
		if ($item[0]==$_GET['item']) {
			if ($_SESSION['cart'][$index][1]+$_GET['quantity']>$product->getQuantity()) {
				$_SESSION['cart'][$index][1] = $product->getQuantity();
			}
			else $_SESSION['cart'][$index][1]+=$_GET['quantity'];
			header('Location: ../Views/cart.php');
			die();
		}
	}
	$_SESSION['cart'][]=array($_GET['item'],$_GET['quantity']);
}
else if ($action=='order') {
	$date = date("Y/m/d");
	OrderDB::add_order($_SESSION['userId'], $date, number_format($_GET['grand_total'], 2));
	
	header('Location: ../Views/account.php');
}

header('Location: ../Views/cart.php');
?>
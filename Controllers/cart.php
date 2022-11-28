<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
 }
$action = $_GET['action'];
if ($action=='remove') {
	$_SESSION['cart'][$_GET['index']]=[];
	unset($_SESSION['cart'][$_GET['index']]);
}
else if ($action=='add') {
	foreach ($_SESSION['cart'] as $index => $item) {
		if ($item[0]==$_GET['item']) {$_SESSION['cart'][$index][1]+=$_GET['quantity'];header('Location: ../Views/cart.php');die();}
	}
	$_SESSION['cart'][]=array($_GET['item'],$_GET['quantity']);
}

header('Location: ../Views/cart.php');
?>
<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
 }

if(isset($_COOKIE[session_name()])){
    $name = session_name();
	$expire = time() - 60 * 60 * 24 * 365;
	$params = session_get_cookie_params();
	$path = $params['path'];
	$domain = $params['domain'];
	$secure = $params['secure'];
	$httponly = $params['httponly'];
	setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
	$_SESSION = [];
	session_destroy();
}

header('Location: ../Views/index.php');
die('Something went very wrong :(');
?>
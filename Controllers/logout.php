<?php
$_SESSION['loggedin'] = false;
$_SESSION = [];
session_regenerate_id(); // change session ID
session_destroy();

$name = session_name();  // get session cookie name 
$expire = new DateTime('-1 year'); // set expire date in the past
$params = session_get_cookie_params(); // get session paramas
$path = $params['path'];
$domain = $params['domain'];
$secure = $params['secure'];
$httponly = $params['httponly'];
setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
header('Location: ../Views/index.php');
?>
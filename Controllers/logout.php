<?php
session_start(); 
session_destroy();

if(isset($_COOKIE[session_name()])){
    $name = session_name();  // get session cookie name 
    $expire = new DateTime('-1 year'); // set expire date in the past
    $params = session_get_cookie_params(); // get session paramas
    $path = $params['/'];
    setcookie($name, '', $expire, $path);
}



header('Location: ../Views/index.php');
exit();
?>
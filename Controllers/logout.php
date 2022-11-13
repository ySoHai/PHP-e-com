<?php
session_start(); 
session_destroy();
/*
if(isset($_COOKIE[session_name()])):
    setcookie(session_name(), '', time()-7000000, '/');
endif;
*/
header('Location: ../Views/index.php');
exit();
?>
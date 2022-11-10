<?php

$email = $_POST['email'];
$email = $_POST['phoneNumber'];
$email = $_POST['firstName'];
$email = $_POST['lastName'];
$email = $_POST['address'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$data = $_POST;

if (empty($data['email']) ||
    empty($data['phoneNumber']) ||
    empty($data['firstName']) ||
    empty($data['lastName']) ||
    empty($data['address']) ||
    empty($data['password']) ||
    empty($data['confirmPassword'])) {
    
    die('Please fill all required fields!');
}

if ($data['password'] !== $data['confirmPassword']) {
   die('Password and Confirm password should match!');   
}



?>
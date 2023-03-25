<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');
$config = require  base_path('config.php');

$db = new Database($config['database']);

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$errors = array();

# Validate inputs


if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 225)) {
    $errors['password'] = 'Password must be at least 7 characters';
}

if (!empty($errors)) {
    view('login.view.php', ['errors' => $errors]);
    exit();
}

# Check if user already exists

$user = $db->query('select * from users where email = :email', [
    ':email' => $email
])->find();

# If yes, redirect to the login page
if (!$user) {
    $errors['user'] = 'No user found with this email. ';
    view('login.view.php', ['errors' => $errors]);
    exit();
} 

if($password == $user['password']) {
    session_start();
    $_SESSION['user'] = [
        'id'=> $user['id'],
        'email' => $email,
        'name' =>  $user['name']
    ];

    header('location: /dashboard');
    exit();
}else{
    $errors['user'] = 'User email/password incorrect.';
    view('login.view.php', ['errors' => $errors]);
    exit(); 
}

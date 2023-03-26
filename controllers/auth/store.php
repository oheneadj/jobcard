<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');
$config = require  base_path('config.php');

$db = new Database($config['database']);

htmlspecialchars($name = $_POST['name']);
htmlspecialchars($email = $_POST['email']);
htmlspecialchars($password = $_POST['password']);

$errors = array();

# Validate inputs
if (!Validator::string($name, 3, 225)) {
    $errors['name'] = 'Name must be at least 5 characters';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 225)) {
    $errors['password'] = 'Password must be at least 7 characters';
}

if (!empty($errors)) {
    view('register.view.php', ['errors' => $errors]);
    exit();
}

# Check if user already exists

$user = $db->query('select * from users where email = :email', [
    ':email' => $email
])->find();


# If yes, redirect to the login page
if ($user) {
    header('location: /login');
    exit();
} else {
    $user = $db->query('insert into users (name, email, password) values (:name, :email, :password)', [
        ':name' => $name,
        ':email' => $email,
        ':password' => $password
    ]);

    session_start();
    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $email,
        'name' => $name
    ];

    header('location: /dashboard');
    exit();
}

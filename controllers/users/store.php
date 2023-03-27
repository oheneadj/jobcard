<?php

use Core\Database;
use Core\Validator;


require base_path('Core/Validator.php');
$config = require  base_path('config.php');

$db = new Database($config['database']);

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$user_type = htmlspecialchars($_POST['user-type']);

$errors = array();


# Validate inputs
if (!Validator::string($name, 3, 225)) {
    $errors['name'] = 'Name must be at least 5 characters';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::user_type($user_type)) {
    $errors['user_type'] = 'You must select a user type';
}

if (!empty($errors)) {
    view('users/create.view.php', ['errors' => $errors]);
    exit();
}

# Check if user already exists

$user = $db->query('select * from users where email = :email', [
    ':email' => $email
])->find();


# If yes, redirect to the login page
if ($user) {
    $errors['user_exists'] = 'A user exists with the same email';
    view('users/create.view.php', ['errors' => $errors]);
    exit();
} else {
    $user = $db->query('insert into users (uuid, name, email, user_type, password, created_by) values (:uuid, :name, :email, :user_type, :password, :created_by)', [
        ':uuid' => genUUID(),
        ':name' => $name,
        ':email' => $email,
        ':user_type' => $user_type,
        ':password' => password_hash("@password@", PASSWORD_BCRYPT),
        ':created_by' => $_SESSION['user']['id']
    ]);


    header("location: /users");
    exit();
}

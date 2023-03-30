<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');
$config = require  base_path('config.php');

$db = new Database($config['database']);


$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$user_type = htmlspecialchars($_POST['user-type']);
$id = htmlspecialchars($_POST['uuid']);

$errors = array();

$current_user_id =  $_SESSION['user']['id'];


$user = $db->query('select * from users where uuid = :uuid', [
    ':uuid' => htmlspecialchars($_POST['uuid'])
])->findOrFail();


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
    return view('users/edit.view.php', [
        'errors' => $errors,
    ]);
}


$db->query("update users set name = :name, email = :email, user_type = :user_type, updated_at = :updated_at, updated_by = :updated_by where uuid = :uuid", [
    ':name' => $name,
    ':email' => $email,
    ':user_type' => $user_type,
    ':updated_at' => date("D F j, Y, g:i a"),
    ':updated_by' => $current_user_id,
    ':uuid' => $id
]);

// 
header('Location: /users');



die();

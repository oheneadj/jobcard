<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');
$config = require  base_path('config.php');

$db = new Database($config['database']);

$errors = [];
$prompts = [];


if (!Validator::string($_POST['body'], 1, 120)) {
    $errors['body'] = 'A body of at most 120 characters is required';
}

if (!empty($errors)) {
    return view('notes/create.view.php', [
        'errors' => $errors,
        'prompts' => $prompts
    ]);
}
$id = $_SESSION['user']['id'];

dd($_SESSION['user']);    

if (empty($errors)) {
    $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
        ':body' => htmlspecialchars($_POST['body']),
        ':user_id' => $id
    ]);

    $prompts['success'] = "Note was created successfully";

    $_POST['body'] = '';

    header('location: /dashboard');
    die();
}

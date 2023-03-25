<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');
$config = require  base_path('config.php');

$db = new Database($config['database']);

$current_user_id =  $_SESSION['user']['id'];

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $current_user_id);

$errors = [];

if (!Validator::string($_POST['body'], 1, 120)) {
    $errors['body'] = 'A body of at most 120 characters is requried';
}

if (!empty($errors)) {
    return view('notes/edit.view.php', [
        'errors' => $errors,
        'note' => $_POST
    ]);
}

$db->query("update notes set body = :body where id = :id", [
    ':body' => htmlspecialchars($_POST['body']),
    ':id' => $_POST['id']
]);

header('location: /notes');
die();

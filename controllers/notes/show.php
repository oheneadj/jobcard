<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$current_user_id =  $_SESSION['user']['id'];


    $note = $db->query('select * from notes where id = :id', [
        ':id' => $_GET['id']
    ])->findOrFail();
    
    
    authorize($note['user_id'] === $current_user_id);
    
    $user = $db->query('select * from users where id = :id', [
            ':id' => $current_user_id
        ])->find();



view("notes/show.view.php", [
    'note' => $note,
    'user' => $user['name']
]);

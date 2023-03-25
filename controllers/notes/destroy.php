<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$current_user_id =  $_SESSION['user']['id'];

    $note = $db->query('select * from notes where id = :id', [
        ':id' => $_POST['id']
    ])->findOrFail();    
    
    authorize($note['user_id'] === $current_user_id);

    $db->query('delete from notes where id = :id',[
        ':id'=> $_POST['id']
    ]);

    header('location: /notes');
    exit();



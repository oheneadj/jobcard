<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$current_user_id =  $_SESSION['user']['id'];


    $note = $db->query('select * from notes where id = :id', [
        ':id' => $_GET['id']
    ])->findOrFail();
    
    
    authorize($note['user_id'] === $current_user_id);
    


 view('notes/edit.view.php', [
    'errors' => [],
    'prompts' => [],
    'note' => $note
 ]);
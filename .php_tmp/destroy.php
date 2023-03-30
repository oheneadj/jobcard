<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$current_user_id =  $_SESSION['user']['id'];

    $user = $db->query('select * from users where uuid = :uuid', [
        ':uuid' => $_POST['id']
    ])->findOrFail();    
    
    authorize($_SESSION['user']['user_type'] === 1, 403);

    $db->query('delete from users where uuid = :uuid',[
        ':uuid'=> $_POST['id']
    ]);

    header('location: /users');

    exit();




    //  ['page_title' => 'Users',
    //  'site_title' => $config['title'],
    //  'navigation' => 'Users',
    //     'user' => $note,]
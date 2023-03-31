<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$db->query('delete from models where id = :id',[
        ':id'=> $_POST['id']
]);

header('location: /models');

exit();

    //  ['page_title' => 'Users',
    //  'site_title' => $config['title'],
    //  'navigation' => 'Users',
    //     'user' => $note]
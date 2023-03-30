<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$users = $db->query("select * from users order by created_at desc")->findAll();

view("users/index.view.php", [
    'users' => $users,
    'db'=> $db 
  ]);
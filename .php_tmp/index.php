<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$users = $db->query("select * from users")->findAll();

view("users/index.view.php", [
    'users' => $users,
    'db'=> $db 
  ]);
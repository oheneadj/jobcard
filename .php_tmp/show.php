<?php


use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$id = $_GET['id'];

$user = $db->query("select * from users where uuid = :id",
    [':id'=> $id]
)->find();



view("users/show.view.php", [
    'user' => $user,
    'db' => $db
  ]);
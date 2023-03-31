<?php


use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$id = $_GET['id'];

$user = $db->query("select * from brands where brand = :id",
    [':id'=> $id]
)->findAll();



view("models/show.view.php", [
    'user' => $user,
    'db' => $db
  ]);
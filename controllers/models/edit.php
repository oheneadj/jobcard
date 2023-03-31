<?php


use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$id = $_GET['id'];

$model = $db->query("select * from models where id = :id",
    [':id'=> $id]
)->find();

$brands = $db->query("select id, name from brands order by name asc"
)->findAll();


view("models/edit.view.php", [
    'model' => $model,
    'brands' => $brands 
  ]);
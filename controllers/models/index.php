<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$models = $db->query("select * from models")->findAll();


view("models/index.view.php", [
    'models' => $models,
    'db' =>  $db
  ]);
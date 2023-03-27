<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$brands = $db->query("select * from brands")->findAll();



view("brands/index.view.php", [
    'brands' => $brands 
  ]);
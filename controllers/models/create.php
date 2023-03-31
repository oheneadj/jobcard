<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$brands = $db->query("select * from brands order by name asc")->findAll();

view("models/create.view.php", [
    'brands' => $brands 
  ]);
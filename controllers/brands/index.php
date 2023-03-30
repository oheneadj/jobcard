<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$brands = $db->query("select * from brands order by created_at desc")->findAll();



view("brands/index.view.php", [
    'brands' => $brands 
  ]);
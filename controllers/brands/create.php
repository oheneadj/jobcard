<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$devices = $db->query("select * from devices")->findAll();


view("brands/create.view.php", [
    'devices' => $devices 
  ]);
<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$id = $_SESSION['user']['id'];

$devices = $db->query("select * from devices order by created_at desc")->findAll();


 view('devices/index.view.php', [
   'devices' => $devices 
 ]);
<?php
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


// $id = $_SESSION['user']['id'];

//$notes = $db->query("select * from notes")->findAll();

 view('dashboard.view.php', [
    'notes' => $notes
 ]);

<?php
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$id = $_SESSION['user']['id'];

$notes = $db->query("select * from notes where user_id = :id", [':id' => $id])->findAll();


 view('notes/index.view.php', [
   'notes' => $notes 
 ]);

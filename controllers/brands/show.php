<?php

use Core\Database;

require base_path('Core/Validator.php');
$config = require  base_path('config.php');

$db = new Database($config['database']);


$models = $db->query('select * from models where brand = :id order by model_name asc', [
    ':id' => trim($_GET["id"])
])->findAll();

view('brands/show.view.php', [
    'models' => $models,
    'db' => $db
]);
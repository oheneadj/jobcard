<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');
$config = require  base_path('config.php');

$db = new Database($config['database']);

$id = htmlspecialchars($_POST['id']);
$brand = htmlspecialchars($_POST['brand']);
$name = strtoupper(htmlspecialchars($_POST['name']));
$modelNumber = strtoupper(htmlspecialchars($_POST['modelNumber']));
$current_user_id = $_SESSION['user']['id'];

$errors = array();

# Validate inputs
if (!Validator::string($name, 2, 225)) {
    $errors['name'] = 'Name must be at least 2 characters';
}

if (!Validator::string($modelNumber, 1, 225)) {
    $errors['modelNumber'] = 'Model Number must be at least 1 character';
}

if ($brand == ""){
    $errors['brand'] = 'You must select a brand';
}

$brands = $db->query('select id, name from brands')->findAll();

if (!empty($errors)) {
    view('/models/edit.view.php', [
        'errors' => $errors,
        'brands' => $brands
    ]);
    exit();
}

// $models = $db->query('select * from models where model_name = :name', [
//     ':name' => $name
// ])->find();


// if ($models) {
//     $errors['model_exists'] = 'Model already exists';

//     view('/models/create.view.php', [
//         'errors' => $errors,
//         'brands' => $brands
//     ]);
//     exit();
// }

$brands = $db->query('select * from brands where id = :id', [
    ':id' => $brand
])->find();


$db->query("update models set model_name = :model_name, brand = :brand, model_number = :model_number, updated_at = :updated_at, updated_by = :updated_by where id = :id", [
    ':model_name' => $name,
    ':brand' => $brand,
    ':model_number' => $modelNumber,
    ':updated_by' => $_SESSION['user']['id'],
    ':updated_at' => date("D F j, Y, g:i a"),
    ':id' => $id
]);


header('Location: /models');
die();

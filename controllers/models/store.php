<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');
$config = require  base_path('config.php');

$db = new Database($config['database']);

$brands = $db->query('select * from brands')->findAll();

$brand = htmlspecialchars($_POST['brand']);
$name = strtoupper(htmlspecialchars($_POST['name']));
$modelNumber = strtoupper(htmlspecialchars($_POST['modelNumber']));


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


if (!empty($errors)) {
    view('/models/create.view.php', [
        'errors' => $errors,
        'brands' => $brands
    ]);
    exit();
}


$models = $db->query('select * from models where model_name = :name', [
    ':name' => $name
])->find();



if ($models) {
    $errors['model_exists'] = 'Model already exists';

    view('/models/create.view.php', [
        'errors' => $errors,
        'brands' => $brands
    ]);
    exit();
}


$brands = $db->query('select * from brands where id = :id', [
    ':id' => $brand
])->find();

if($brands){
    $db->query('insert into models (brand, model_name, model_number, created_by) values (:brand, :model_name, :model_number, :created_by)', [
        ':model_name' => $name,
        ':brand' => $brand,
        ':model_number' => $modelNumber,
        ':created_by' => $_SESSION['user']['id']
    ]);
    
        header("location: /models");
    exit();
} else {

        $errors['name'] = 'Error creating brand. Please try again';
        view('/models/create.view.php', ['errors' => $errors]);
    exit();
}
<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');
$config = require  base_path('config.php');

$db = new Database($config['database']);

$devices = $db->query('select * from devices')->findAll();

$device = htmlspecialchars($_POST['device']);
$name = strtoupper(htmlspecialchars($_POST['name']));


$errors = array();

# Validate inputs
if (!Validator::string($name, 2, 225)) {
    $errors['name'] = 'Name must be at least 3 characters';
}

if ($device == ""){
    $errors['device'] = 'You must select a device';
}

if (!empty($errors)) {
    view('/brands/create.view.php', [
        'errors' => $errors,
        'devices' => $devices
    ]);
    exit();
}

$brands = $db->query('select * from brands where name = :name', [
    ':name' => $name
])->find();

if ($brands) {

    $errors['brand_exists'] = 'Brand already exists';
    view('/brands/create.view.php', [
        'errors' => $errors,
        'devices' => $devices
    ]);
    exit();
}


$devices = $db->query('select * from devices where id = :id', [
    ':id' => $device
])->find();

if($devices){
    $db->query('insert into brands (name, device, created_by) values (:name, :device, :created_by)', [
        ':name' => $name,
        ':device' => $device,
        ':created_by' => $_SESSION['user']['id']
    ]);
    
        header("location: /brands");
    exit();
}else{
        $errors['name'] = 'Error creating device. Please try again';
        view('/brands/create.view.php', ['errors' => $errors]);
    exit();
}
<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');
$config = require  base_path('config.php');

$db = new Database($config['database']);

htmlspecialchars($name = $_POST['name']);


$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder = base_path("./public/images/" . $filename);


$errors = array();

# Validate inputs
if (!Validator::string($name, 3, 225)) {
    $errors['name'] = 'Name must be at least 3 characters';
}

if (!empty($errors)) {
    view('/devices/create.view.php', ['errors' => $errors]);
    exit();
}

$device = $db->query('select * from devices where name = :name', [
    ':name' => $name
])->find();

if($device){
    $errors['name'] = 'A device exist with the same name';
    view('/devices/create.view.php', ['errors' => $errors]);
    exit();
}else{

    $db->query('insert into devices (name, image) values (:name, :image)', [
        ':name' => $name,
        ':image' => $filename,
    ]);
    if (move_uploaded_file($tempname, $folder)) {
        header("location: /devices");
    exit();
    } else {
        $errors['name'] = 'Error creating device. Please try again';
        view('/devices/create.view.php', ['errors' => $errors]);
    exit();
    }

}




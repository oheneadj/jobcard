<?php

dd("Here");
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


$db->query('delete from brands where id = :id',[
        ':id'=> $_POST['id']
]);

header('location: /brands');

exit();
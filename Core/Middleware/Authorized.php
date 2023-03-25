<?php
namespace Core\Middleware;

class Authorized {
    public function handle(){
        if(!$_SESSION['user'] ?? false){
            header('location: /');
            exit();
        }
    }
}
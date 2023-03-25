<?php

namespace Core\Middleware;

class Middleware{
   const MAP = [
    'guest' => Guest::class,
    'authorized' => Authorized::class
   ];

   public static function resolve($key){
    if(!$key){
        return;
    }

    $middleware = static::MAP[$key] ?? false;

    if(!$middleware){
        throw new \Exception("No matching middleware found for key '{$key}'.");
    }

    (new $middleware)->handle();
   }
}
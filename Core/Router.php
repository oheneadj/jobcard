<?php

namespace Core;

use Core\Middleware\Authorized;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router{

    protected $routes = [];

    public function add ($method, $uri, $controller){
        // This is another way of getting the params for add()
        // $this->routes[] = compact('method', 'uri', 'controller')
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware'=> null
        ];

        return $this;
    }

    public function get($uri, $controller){
      return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller){
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller){
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller){
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller){
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key){
       $this->routes[array_key_last($this->routes)]['middleware']= $key;

       return $this;
    }

     public function route($uri, $method){
        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)){
                # Middleware Code
                Middleware::resolve($route['middleware']);
                return require base_path($route['controller']);
            }
        }
        
        $this->abort();
     }

   public function abort($status_code = 404){
    http_response_code($status_code);

    require base_path("views/{$status_code}.php");

    die();
}

}







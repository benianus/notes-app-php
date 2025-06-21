<?php

namespace Core;
class Router
{
    public $routes = [];
    public function add($uri, $controller, $method = "GET")
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method
        ];
    }
    public function get($uri, $controller)
    {
        $this->add($uri, $controller, "GET");
    }
    public function post($uri, $controller)
    {
        $this->add($uri, $controller, "POST");
    }
    public function patch($uri, $controller)
    {
        $this->add($uri, $controller, "PATCH");
    }
    public function put($uri, $controller)
    {
        $this->add($uri, $controller, "PUT");
    }
    public function delete($uri, $controller)
    {
        $this->add($uri, $controller, "DELETE");
    }
    public function route($uri, $method = "GET")
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && strtoupper($route['method']) === strtoupper($method)) {
                return require base_url($route['controller']);
            }
        }

        require base_url("Controllers/not-found.php");
        die;
    }
}
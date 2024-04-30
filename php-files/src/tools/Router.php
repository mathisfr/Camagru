<?php

class Router{
    private array $routes = [];

    public function addRoute(string $name, $uri, ?array $params, ?array $middleware): void{
        $this->routes[$name] = [
            "uri"=> $uri,
            "params" => $params,
            "middleware" => $middleware
       ];
    }

    public function run(): void{
        if (isset($_GET["page"])){
            if (array_key_exists($_GET["page"], $this->routes)){
                if(is_callable($this->routes[$_GET["page"]]["uri"])){
                    $this->routes[$_GET["page"]]["uri"]();
                }else{
                    require_once($this->routes[$_GET["page"]]["uri"]);
                }
            }else{
                require_once(__DIR__ ."/../../templates/pages/404.php");
            }
        }
        else{
            require_once(__DIR__ ."/../../templates/pages/home.php");
        }
    }
}
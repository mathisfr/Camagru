<?php
require_once("./src/controllers/userLogin.php");
require_once("./src/controllers/userRegister.php");
require_once("./src/controllers/userUpdate.php");
require_once("./src/tools/Utils.php");
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
                    $params = $this->routes[$_GET["page"]]["params"];
                    if (is_array($params)){
                        $sendParams = [];
                        foreach($params as $param){
                            $sendParams[] = $_POST[$param];
                        }
                        $this->routes[$_GET["page"]]["uri"](...$sendParams);
                    }else{
                        $this->routes[$_GET["page"]]["uri"]();
                    }
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
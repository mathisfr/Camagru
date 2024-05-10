<?php
require_once("./src/controllers/userLogin.php");
require_once("./src/controllers/userRegister.php");
require_once("./src/controllers/userUpdate.php");
require_once("./src/tools/Utils.php");
class Router{
    private array $routes = [];

    public function addRoute(string $name, $uri, ?string $type, ?array $params, ?Callable $middleware): void{
        $this->routes[$name] = [
            "uri"=> $uri,
            "params" => $params,
            "middleware" => $middleware,
            "type"=>$type,
       ];
    }
    public function run(): void{
        if (isset($_GET["page"])){
            if (array_key_exists($_GET["page"], $this->routes)){
                if(is_callable($this->routes[$_GET["page"]]["uri"])){
                    $params = $this->routes[$_GET["page"]]["params"];
                    $type = $this->routes[$_GET["page"]]["type"];
                    if (is_array($params)){
                        $sendParams = [];
                        foreach($params as $param){
                            if ($type == "POST"){
                                $sendParams[] = $_POST[$param] ?? null;
                            }else{
                                $sendParams[] = $_GET[$param] ?? null;
                            }
                        }
                        if ($this->executeMiddleware($this->routes[$_GET["page"]]["middleware"])){
                            $this->routes[$_GET["page"]]["uri"](...$sendParams);
                        }
                    }else{
                        if ($this->executeMiddleware($this->routes[$_GET["page"]]["middleware"])){
                            $this->routes[$_GET["page"]]["uri"]();
                        }
                    }
                }else{
                    if ($this->executeMiddleware($this->routes[$_GET["page"]]["middleware"])){
                        require_once($this->routes[$_GET["page"]]["uri"]);
                    }
                }
            }else{
                echo $_GET["page"];
                require_once(__DIR__ ."/../../templates/pages/404.php");
            }
        }
        else{
            require_once(__DIR__ ."/../../templates/pages/home.php");
        }
    }

    private function executeMiddleware($middleware): bool{
        if ($middleware != null && is_callable($middleware)){
            return $middleware();
        }
        return true;
    }
}


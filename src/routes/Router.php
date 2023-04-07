<?php 

namespace Router;

use App\Exceptions\NotFoundException;

class Router {

    public $url;
    public $routes = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get(string $path, string $action)
    {
        $route = new Route($path, $action);
        $this->routes['GET'][] = $route;
        return $route; // On retourne la route pour "enchaîner" les méthodes
    }

    public function run()
    {
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route)
        {
            if($route->matches($this->url))
            {
                return $route->execute();
            }
        }
        
        throw new NotFoundException('La page demandée est introuvable.');
    }
}
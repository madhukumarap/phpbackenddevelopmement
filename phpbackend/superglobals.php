<?php
declare(strict_types=1);

class Router
{
    private array $routes = [];

    public function register(string $route, callable $action)
    {
        $this->routes[$route] = $action;
        return $this;
    }

    public function resolve(string $requestURI)
    {
        $route = explode('?', $requestURI)[0];
        $action = $this->routes[$route] ?? null;

        if (!$action) {
            throw new RouterBaseException();
        }
        
        call_user_func($action);
    }
}

class RouterBaseException extends Exception
{
    protected $message = '404 not found';
}

// Usage example
$router = new Router();
$router->register('/phpbackenddevelopmement/phpbackend/superglobals.php/about', 
function(){
    echo 'About us';
});

$router->register('/phpbackenddevelopmement/phpbackend/superglobals.php/contact', 
function(){
    echo 'Contact us';
});

$router->register('/phpbackenddevelopmement/phpbackend/superglobals.php/services', 
function(){
    echo 'Our services';
});

try {
    $router->resolve($_SERVER['REQUEST_URI']);
} catch (RouterBaseException $e) {
    echo $e->getMessage();
}

<?php
declare(strict_types=1);

class Invoice
{
    public function index(): string
    {
        return 'Invoices';
    }

    public function create(): string 
    {
        return '<form action="/phpbackenddevelopmement/phpbackend/superglobals.php/invoice/create" method="post">
                    <label for="amount">Amount</label> 
                    <input type="text" name="amount" id="amount" />
                    <button type="submit">Submit</button>
                </form>';
    }

    public function store() 
    {
        $amount = $_POST['amount'] ?? null;
        if ($amount) {
            echo 'Amount: ' . htmlspecialchars($amount);
        } else {
            echo 'No amount was submitted.';
        }
    }
}

class Router
{
    private array $routes = [];

    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function resolve(string $requestURI, string $requestMethod)
    {
        $route = explode('?', $requestURI)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;

        if (!$action) {
            throw new RouterBaseException();
        }
        
        echo call_user_func($action);
    }
}

class RouterBaseException extends Exception
{
    protected $message = '404 not found';
}

// Usage example
$router = new Router();
$invoice = new Invoice();

$router->get('/phpbackenddevelopmement/phpbackend/superglobals.php/about', 
    function() {
        return 'About us';
    }
);

$router->get('/phpbackenddevelopmement/phpbackend/superglobals.php/contact', 
    function() {
        return 'Contact us';
    }
);

$router->get('/phpbackenddevelopmement/phpbackend/superglobals.php/services', 
    function() {
        return 'Our services';
    }
);

$router->get('/phpbackenddevelopmement/phpbackend/superglobals.php/invoices', 
    function() use ($invoice) {
        return $invoice->index();
    }
);

$router->get('/phpbackenddevelopmement/phpbackend/superglobals.php/invoice/create', 
    function() use ($invoice) {
        return $invoice->create();
    }
);

$router->post('/phpbackenddevelopmement/phpbackend/superglobals.php/invoice/create', 
    function() use ($invoice) {
        return $invoice->store();
    }
);

try {
    $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
} catch (RouterBaseException $e) {
    echo $e->getMessage();
}

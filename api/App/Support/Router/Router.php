<?php namespace Tradeup\App\Support\Router;

use Exception;
use Tradeup\App\Support\Router\Facades\Route;

class Router
{
    private array $action;
    private array $routes;
    private string $httpVerb;

    public function __construct(private ?string $current_request = null)
    {
        Route::getSingleton();
        $this->routes = Route::getRoutes();
        $this->httpVerb = strtolower($_SERVER['REQUEST_METHOD'] ?? null);
    }

    public function checkRoute(): Router
    {
        if (!isset($this->routes[$this->current_request])){
            throw new Exception("Rota não encontrada", 404);
        }

        if (!in_array($this->httpVerb, $this->routes[$this->current_request])) {
            throw new Exception("Não é suportado o método {$this->httpVerb}", 400);
        }

        $this->action = $this->routes[$this->current_request];

        if (! isset($this->action[0])) {
            throw new Exception("É obrigatório especificar o controller ao invocar a rota.", 401);
        }

        if (! isset($this->action[1])) {
            throw new Exception("É obrigatório especificar um método presente no controller para executar.", 401);
        }
    
        if (! isset($this->action[2])) {
            throw new Exception("Não foi possível continuar pois o verbo http não está sendo encontrado na lista da rota.", 400);
        }

        return $this;
    }

    public function getController()
    {
        return $this->action[0];
    }

    public function getMethod()
    {
        return $this->action[1];
    }

    public function getHttpVerb()
    {
        return $this->action[2];
    }
}
<?php namespace Tradeup\App;

use Exception;
use ReflectionClass;
use Tradeup\App\Support\Response\HttpResponse;
use Tradeup\App\Support\Router\Router;


class TradeupApp
{
    private Router $router;

    public function __construct(
        private ?string $uri_path = null
    ) {
        $this->router = new Router($uri_path);
    }

    public function registerMiddleware(string $middleware)
    {
        $executeAction = new ReflectionClass($middleware);
        $executeAction->newInstance()->handle();

        return $this;
    }

    public function run()
    {
        try {
            $route = $this->router->checkRoute();

            $executeAction = new ReflectionClass($route->getController());

            $method = $route->getMethod();

            // print current action by route
            echo $executeAction->newInstance()->$method();
        }
        catch(Exception $exception) {
            echo HttpResponse::error(null, $exception->getMessage(), $exception->getCode());
        }
    }
}
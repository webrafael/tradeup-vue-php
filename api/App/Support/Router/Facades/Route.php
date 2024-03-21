<?php namespace Tradeup\App\Support\Router\Facades;

class Route
{
    private static array $routes = [];
    private static Route | null $instance = null;

    public static function getSingleton()
    {
        if (self::$instance === null) {
            self::$instance = new Route();
        }
        return self::$instance;
    }

    public static function getRoutes(): array
    {
        return static::$routes;
    }

    /**
     * get
     *
     * @param string $route
     * @param closure | object[]
     * @return void
     */
    public static function get(string $uri, $resource)
    {
        static::$routes[$uri] = array_merge($resource, ['get']);
    }

    /**
     * post
     *
     * @param string $route
     * @param closure | object[]
     * @return void
     */
    public static function post(string $uri, $resource)
    {
        static::$routes[$uri] = array_merge($resource, ['post']);
    }

    /**
     * put
     *
     * @param string $route
     * @param closure | object[]
     * @return void
     */
    public static function put(string $uri, $resource)
    {
        static::$routes[$uri] = array_merge($resource, ['put']);
    }

    /**
     * path
     *
     * @param string $route
     * @param closure | object[]
     * @return void
     */
    public static function path(string $uri, $resource)
    {
        static::$routes[$uri] = array_merge($resource, ['path']);
    }

    /**
     * delete
     *
     * @param string $route
     * @param closure | object[]
     * @return void
     */
    public static function delete(string $uri, $resource)
    {
        static::$routes[$uri] = array_merge($resource, ['delete']);
    }

    /**
     * options
     *
     * @param string $route
     * @param closure | object[]
     * @return void
     */
    public static function options(string $uri, $resource)
    {
        static::$routes[$uri] = array_merge($resource, ['options']);
    }

    /**
     * head
     *
     * @param string $route
     * @param closure | object[]
     * @return void
     */
    public static function head(string $uri, $resource)
    {
        static::$routes[$uri] = array_merge($resource, ['head']);
    }
}
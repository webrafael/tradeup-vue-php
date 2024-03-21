<?php namespace Tradeup\App\Middlewares;

use Tradeup\App\Middlewares\Contract\Middleware;

class CorsMiddleware implements Middleware
{
    /**
     * Será necessário alterar o endereço no nginx também
     */
    private $httpOrigin = 'http://localhost:8080';

    public function handle(): void
    {
        header("Access-Control-Allow-Origin: {$this->httpOrigin}");
        header('Access-Control-Allow-Methods: GET');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    }
}

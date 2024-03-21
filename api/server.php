<?php

use Tradeup\App\Middlewares\CorsMiddleware;
use Tradeup\App\TradeupApp;

define('__ROOT_DIR__', dirname(__DIR__) . DIRECTORY_SEPARATOR);

include_once __ROOT_DIR__ . 'vendor/autoload.php';
include_once __ROOT_DIR__ . 'api/Routes/Api.php';

$url_path = urldecode(
    parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH)
);

$app = (new TradeupApp($url_path))
    ->registerMiddleware(CorsMiddleware::class)
    ->run();
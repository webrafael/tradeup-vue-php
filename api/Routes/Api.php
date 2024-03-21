<?php

use Tradeup\App\Support\Router\Facades\Route;

Route::get('/cep', [\Tradeup\Controllers\CepController::class, 'index']);
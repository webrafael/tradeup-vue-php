<?php namespace Tradeup\App\Middlewares\Contract;

interface Middleware
{
    public function handle(): void;
}
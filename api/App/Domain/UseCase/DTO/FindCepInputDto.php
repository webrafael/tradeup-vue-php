<?php namespace Tradeup\App\Domain\UseCase\DTO;

class FindCepInputDto
{
    public function __construct(
        public ?string $cep = null
    ) { }
}
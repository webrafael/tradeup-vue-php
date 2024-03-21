<?php namespace Tradeup\App\Domain\UseCase\DTO;

class FindCepOutputDto
{
    public function __construct(
        public string $bairro,
        public string $cep,
        public string $complemento,
        public int $ddd,
        public string $gia,
        public string $ibge,
        public string $localidade,
        public string $logradouro,
        public int $siafi,
        public string $uf
    ) { }
}
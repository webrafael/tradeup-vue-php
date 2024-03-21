<?php namespace Tradeup\App\Domain\UseCase;

use Exception;
use Tradeup\App\Domain\Services\CepService;
use Tradeup\App\Domain\UseCase\DTO\FindCepInputDto;
use Tradeup\App\Domain\UseCase\DTO\FindCepOutputDto;

class FindCepUseCase
{
    const ONLY_NUMBERS = "/[^0-9]/";

    private CepService $service;

    public function __construct()
    {
        $this->service = new CepService();
    }

    public function execute(FindCepInputDto $input): FindCepOutputDto
    {
        $cep = $this->checkCep($input);

        $findCep = $this->service->findCep($cep);

        return new FindCepOutputDto(
            bairro: $findCep->bairro,
            cep: $findCep->cep,
            complemento: $findCep->complemento,
            ddd: $findCep->ddd,
            gia: $findCep->gia,
            ibge: $findCep->ibge,
            localidade: $findCep->localidade,
            logradouro: $findCep->logradouro,
            siafi: $findCep->siafi,
            uf: $findCep->uf,
        );
    }

    private function checkCep(FindCepInputDto $input)
    {
        
        $check = preg_replace(self::ONLY_NUMBERS, "", $input->cep ?? '');
        
        if (is_null($check) || empty($check) || strlen($check) < 8) {
            throw new Exception("É necessário passar um cep válido", 422);
        }

        return $check;
    }
}
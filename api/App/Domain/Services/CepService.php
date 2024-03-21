<?php namespace Tradeup\App\Domain\Services;

use Exception;
use Tradeup\App\Domain\Entity\Cep;

class CepService
{
    private \GuzzleHttp\Client $http;

    public function __construct()
    {
        $this->http = new \GuzzleHttp\Client();
    }

    public function findCep(?string $cep = null): Cep
    {
        try {
            $request_cep  = $this->http->get("https://viacep.com.br/ws/{$cep}/json");
            $response_cep = json_decode($request_cep->getBody()->getContents());

            if (isset($response_cep->erro) && $response_cep->erro == true) {
                throw new Exception("Não foi possível encontrar um cep válido", 400);
            }
    
            return new Cep(
                bairro: $response_cep?->bairro,
                cep: $response_cep?->cep,
                complemento: $response_cep?->complemento,
                ddd: $response_cep?->ddd,
                gia: $response_cep?->gia,
                ibge: $response_cep?->ibge,
                localidade: $response_cep?->localidade,
                logradouro: $response_cep?->logradouro,
                siafi: $response_cep?->siafi,
                uf: $response_cep?->uf,
            );
        } catch(Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }
}
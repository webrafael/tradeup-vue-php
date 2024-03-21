<?php namespace Tradeup\App\Domain\Entity;

use Exception;

class Cep
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
        public string $uf,
    ) {
        $this->validation();
    }

    private function validation()
    {
        if(is_null($this->bairro)) {
            throw new Exception("O campo bairro não pode estar vazio", 422);
        }

        if(is_null($this->cep) || empty($this->cep)) {
            throw new Exception("O campo cep não pode estar vazio", 422);
        }

        if(is_null($this->complemento)) {
            throw new Exception("O campo complemento não pode estar vazio", 422);
        }

        if(is_null($this->ddd)) {
            throw new Exception("O campo ddd não pode estar vazio", 422);
        }

        if(is_null($this->gia)) {
            throw new Exception("O campo gia não pode estar vazio", 422);
        }

        if(is_null($this->ibge)) {
            throw new Exception("O campo ibge não pode estar vazio", 422);
        }

        if(is_null($this->localidade)) {
            throw new Exception("O campo localidade não pode estar vazio", 422);
        }

        if(is_null($this->logradouro)) {
            throw new Exception("O campo logradouro não pode estar vazio", 422);
        }

        if(is_null($this->siafi)) {
            throw new Exception("O campo siafi não pode estar vazio", 422);
        }
    
        if(is_null($this->uf)) {
            throw new Exception("O campo uf não pode estar vazio", 422);
        }
    }
}
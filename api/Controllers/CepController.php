<?php namespace Tradeup\Controllers;

use Tradeup\App\Domain\UseCase\DTO\FindCepInputDto;
use Tradeup\App\Domain\UseCase\FindCepUseCase;
use Tradeup\App\Support\Response\HttpResponse;

class CepController
{
    private FindCepUseCase $usecase;

    public function __construct()
    {
        $this->usecase = new FindCepUseCase();
    }

    public function index()
    {
        $cep = filter_input(INPUT_GET, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);

        $execute = $this->usecase->execute(new FindCepInputDto(
            cep: $cep
        ));

        return HttpResponse::success($execute, 'Cep encontrado com sucesso!', 200);
    }
}


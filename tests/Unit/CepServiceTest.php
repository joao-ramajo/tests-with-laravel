<?php

use App\Services\CepService;
use Illuminate\Support\Facades\Http;

beforeEach(function() {
    $this->service = new CepService();

    $this->dadosMock = [
        'cep' => '06331-150',
        'logradouro' => 'Rua Exemplo',
        'bairro' => 'Centro',
        'localidade' => 'Carapicuíba',
        'uf' => 'SP',
    ];
});

test('Retorna as informações de um cep válido', function() {
    Http::fake([
        'https://viacep.com.br/ws/06331150/json/' => Http::response($this->dadosMock, 200),
    ]);

    $resultado = $this->service->buscarEndereco('06331150');

    expect($resultado)->toMatchArray($this->dadosMock);
    expect($resultado['bairro'])->toBe('Centro');
});

test('Lança uma exceção por falta de parametros', function(){
    expect(fn() => $this->service->buscarEndereco())
        ->toThrow(\ArgumentCountError::class);
});
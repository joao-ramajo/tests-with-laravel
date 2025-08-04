<?php

use App\Services\OrderService;

beforeEach(function() {
    $this->service = new OrderService();
    $this->valorValido = 50.25;
    $this->cupomValido = 'DESCONTO10';
    $this->cupomInvalido = 'DESCONTOINVALIDO';
});

test('Calcula o desconto correto para um produto de 100', function() {
    expect($this->service->calculateDiscount(100, $this->cupomValido))
        ->toBe(90.0);
});

test('Retorna o valor normal se não houver cupom', function() {
    expect($this->service->calculateDiscount($this->valorValido, $this->cupomInvalido))
        ->toBeBetween(($this->valorValido - 1), ($this->valorValido + 1));
});

test('Lança uma exceção se não for um valor válido', function() {
    expect(fn() => $this->service->calculateDiscount('invalido'))
        ->toThrow(\TypeError::class);
});

test('Lança uma exceção se não houver parametros obrigatórios', function() {
    expect(fn() => $this->service->calculateDiscount())
        ->toThrow(\ArgumentCountError::class);
});
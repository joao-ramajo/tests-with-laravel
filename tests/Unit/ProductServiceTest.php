<?php

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;

beforeEach(function() {
    $repository = Mockery::mock(ProductRepository::class);
    $this->repository = $repository;
    $this->service = new ProductService($repository);
});

test('Retorna o model de um produto ao buscar ID existente', function() {

    $this->repository
        ->shouldReceive('findOrFail')
        ->with(1)
        ->once()
        ->andReturn(new Product());

    expect($this->service->findProduct(1))
        ->toBeInstanceOf(Product::class);
});

test('Retorna nulo ao buscar ID inexistente', function() {
    $this->repository
        ->shouldReceive('findOrFail')
        ->with(1)
        ->once()
        ->andReturn(null);

    expect($this->service->findProduct(1))->toBeNull();
});

test('Retorna nulo se o repository retornar uma exceção', function(){
    $this->repository
        ->shouldReceive('findOrFail')
        ->with(1)
        ->once()
        ->andThrow(\Exception::class);

    expect($this->service->findProduct(1))
        ->toBeNull();
});
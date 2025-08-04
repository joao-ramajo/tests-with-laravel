<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Exception;

class ProductService
{
    public function __construct(protected ProductRepository $repository) {}

    public function findProduct(int $id): ?Product
    {
        try {
            return $this->repository->findOrFail($id);
        } catch (Exception $e) {
            return null;
        }
    }
}

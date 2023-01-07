<?php

namespace App\Domain\Product\Repository;

use App\Domain\Product\Product;
use Symfony\Component\Uid\Uuid;

interface ProductRepositoryInterface
{
    public function add(Product $product): void;

    /**
     * @return Product[]
     */
    public function find(int $limit): array;

    public function findById(Uuid $productId): ?Product;

    public function remove(Product $product): void;
}

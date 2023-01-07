<?php

namespace App\Application\Product\Query\Handler;

use App\Application\Product\Query\FindProductsQuery;
use App\Domain\Product\Repository\ProductRepositoryInterface;
use App\Infrastructure\MessageBus\Query\QueryBus;

class FindProductsQueryHandler
{
    public function __construct(
        private readonly ProductRepositoryInterface $productRepository,
        private readonly QueryBus $queryBus
    ) {
    }

    public function __invoke(FindProductsQuery $query): array
    {
        $products = $this->productRepository->find($query->limit);

        return $products;
    }
}
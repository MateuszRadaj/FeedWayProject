<?php

namespace App\Application\Product\Query;

use App\Infrastructure\MessageBus\Query\QueryInterface;

class FindProductsQuery implements QueryInterface
{
    public function __construct(
        public readonly int $limit
    ) {
    }
}
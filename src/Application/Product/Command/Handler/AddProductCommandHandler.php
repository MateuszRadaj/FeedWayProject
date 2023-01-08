<?php

namespace App\Application\Product\Command\Handler;

use App\Application\Product\Command\AddProductCommand;
use App\Domain\Product\Product;
use App\Domain\Product\Repository\ProductRepositoryInterface;
use Symfony\Component\Uid\Uuid;

class AddProductCommandHandler
{   
    public function __construct(
        private readonly ProductRepositoryInterface $productRepository,
    ) {

    }

    public function __invoke(AddProductCommand $command): void
    {
        $productId = Uuid::v6();
        $productId = Uuid::fromString($productId);

        $product = new Product(
            $productId,
            $command->product->name,
            $command->product->price,
            $command->product->ingredients
        );

        $this->productRepository->add($product);
    }
}
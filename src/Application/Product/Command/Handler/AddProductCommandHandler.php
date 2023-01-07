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
        // Tutaj można użyć buildera do stworzenia produktu wraz z cenami
        $productId = Uuid::v6();

        $product = new Product(
            $productId,
            $command->product->name,
            $command->product->ingredients
        );

        $this->productRepository->add($product);
    }
}
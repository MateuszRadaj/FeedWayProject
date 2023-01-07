<?php

namespace App\UserInterface\Builder\Product;

use App\UserInterface\Dto\Product\AddProductInputDto;
use Symfony\Component\Serializer\SerializerInterface;

class AddProductInputBuilder implements AddProductInputBuilderInterface
{
    private AddProductInputDto $product;

    public function __construct(
        private readonly SerializerInterface $serializer
    ) {
        $this->reset();
    }

    public function reset(): void
    {
        $this->product = new AddProductInputDto();
    }

    public function buildProduct(string $payload): void
    {   
        $this->product = $this->serializer->deserialize(
            $payload,
            AddProductInputDto::class,
            'json'
        );
    }

    public function getProduct(): AddProductInputDto
    {
        $product = $this->product;
        $this->reset();

        return $product;
    }
}
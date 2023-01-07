<?php

namespace App\UserInterface\Builder\Product;

use App\UserInterface\Dto\Product\AddProductInputDto;

interface AddProductInputBuilderInterface
{   
    public function reset(): void;

    public function buildProduct(string $payload): void;

    public function getProduct(): AddProductInputDto;
}
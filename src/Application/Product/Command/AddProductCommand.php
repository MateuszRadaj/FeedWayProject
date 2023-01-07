<?php

namespace App\Application\Product\Command;

use App\Infrastructure\MessageBus\Command\CommandInterface;
use App\UserInterface\Dto\Product\AddProductInputDto;

class AddProductCommand implements CommandInterface
{   
    public function __construct(
        public readonly AddProductInputDto $product
    ) {
    }
}
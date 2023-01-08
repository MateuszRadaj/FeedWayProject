<?php

namespace App\UserInterface\Dto\OrderItem;

use Symfony\Component\Validator\Constraints as Assert;

class AddOrderItemInputDto
{
    #[Assert\NotBlank]
    #[Assert\GreaterThanOrEqual(1)]
    public int $quantity;

    #[Assert\NotBlank]
    public $items;

    #[Assert\NotBlank]
    public string $status;

    #[Assert\NotBlank]
    public string $orderedAt;
}
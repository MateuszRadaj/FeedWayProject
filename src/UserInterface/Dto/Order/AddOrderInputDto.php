<?php

namespace App\UserInterface\Dto\Order;

use Symfony\Component\Validator\Constraints as Assert;

class AddOrderInputDto
{
    #[Assert\NotBlank]
    public string $user_email;

    #[Assert\NotBlank]
    public $items;

    #[Assert\NotBlank]
    public string $status;

    #[Assert\NotBlank]
    public string $orderedAt;
}
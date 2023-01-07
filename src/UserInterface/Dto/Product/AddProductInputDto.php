<?php

namespace App\UserInterface\Dto\Product;

use Symfony\Component\Validator\Constraints as Assert;

class AddProductInputDto
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    public string $name;

    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    public string $ingredients;
}
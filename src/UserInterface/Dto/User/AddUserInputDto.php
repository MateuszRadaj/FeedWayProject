<?php

namespace App\UserInterface\Dto\User;

use Symfony\Component\Validator\Constraints as Assert;

class AddUserInputDto
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    public string $email;

    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    public string $username;

    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    public string $password;

    
    public array $roles = [];
}
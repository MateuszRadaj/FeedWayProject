<?php

namespace App\Application\User\Command\Handler;

use App\Application\User\Command\AddUserCommand;
use App\Domain\User\User;
use App\Domain\User\Repository\UserRepositoryInterface;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AddUserCommandHandler
{   
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {

    }

    public function __invoke(AddUserCommand $command): void
    {
        $user = new User();
        $user->setEmail();

        $this->userRepository->add($user);
    }
}
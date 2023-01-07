<?php

namespace App\Application\User\Command\Handler;

use App\Application\User\Command\AddUserCommand;
use App\Domain\User;
use App\Domain\User\Repository\UserRepositoryInterface;
use Symfony\Component\Uid\Uuid;

class AddUserCommandHandler
{   
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
    ) {

    }

    public function __invoke(AddUserCommand $command): void
    {
        // Tutaj można użyć buildera do stworzenia produktu wraz z cenami
        $userId = Uuid::v6();

        $user = new User(
            $userId,
            $command->user->email,
            $command->user->username,
            $command->user->password,
            $command->user->roles
        );

        $this->userRepository->add($user);
    }
}
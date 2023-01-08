<?php

namespace App\Application\User\Command;

use App\Infrastructure\MessageBus\Command\CommandInterface;
use App\UserInterface\Dto\User\AddUserInputDto;

class AddUserCommand implements CommandInterface
{   
    public function __construct(
        public readonly AddUserInputDto $user
    ) {
    }
}
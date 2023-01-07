<?php

namespace App\Infrastructure\MessageBus\Command;

use Symfony\Component\Messenger\MessageBusInterface;

class CommandBus
{
    public function __construct(
        private MessageBusInterface $commandBus
    ) {
    }

    public function handle(CommandInterface $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
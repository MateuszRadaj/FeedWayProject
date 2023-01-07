<?php

namespace App\Domain\User\Repository;

use App\Domain\User\User;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

interface UserRepositoryInterface
{
    public function add(User $user): void;

    public function upgradePassword(PasswordUpgraderInterface $user, string $newEncodedPassword): void;

    /**
     * @return User[]
     */
    public function find(): array;
}
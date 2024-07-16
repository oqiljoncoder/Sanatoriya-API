<?php

namespace App\Component;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFactory
{
    public function __construct(private  readonly  UserPasswordHasherInterface $passwordHash)
    {
    }

    public function create(string $email, string $password): User
    {
        $user = new User();

        $hashPassword = $this->passwordHash->hashPassword($user, $password);

        $user->setEmail($email);
        $user->setPassword($hashPassword);

        return $user;
    }
}
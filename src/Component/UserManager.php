<?php

namespace App\Component;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
    public function __construct(private readonly EntityManagerInterface $manager)
    {
    }

    public function save(User $user, bool $isNeedFlush): void
    {
        $this->manager->persist($user);

        if ($isNeedFlush){
            $this->manager->flush();
        }
    }
}
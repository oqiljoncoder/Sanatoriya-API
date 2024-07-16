<?php

namespace App\Controller;

use App\Component\UserFactory;
use App\Component\UserManager;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserControllerAction extends AbstractController
{
    public function __construct(
        private readonly UserManager $userManager,
        private readonly UserFactory $userFactory
    )
    {
    }

    public function __invoke(User $data):User
    {
        $user = $this->userFactory->create($data->getEmail(), $data->getPassword());

        $this->userManager->save($user, true);

        return $user;
    }
}
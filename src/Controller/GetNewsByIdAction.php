<?php

namespace App\Controller;

use App\Repository\NewPageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetNewsByIdAction extends AbstractController
{
    public function __invoke(NewPageRepository $newPageRepository)
    {
        return $newPageRepository->findLastAllNewsById();

    }
}
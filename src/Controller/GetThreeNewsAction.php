<?php

namespace App\Controller;

use App\Repository\NewPageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetThreeNewsAction extends AbstractController
{
    public function __invoke(NewPageRepository $newPageRepository)
    {

        return $newPageRepository->findLastThreeNews();
    }

}
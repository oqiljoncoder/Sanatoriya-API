<?php

namespace App\Controller;

use App\Repository\TariffRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetTariffAction extends AbstractController
{
    public function __invoke(TariffRepository $tariffRepository)
    {

        return $tariffRepository->findLastTariff();
    }

}
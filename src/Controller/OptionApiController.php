<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OptionApiController extends AbstractController
{
    #[Route('/option/api', name: 'app_option_api')]
    public function index(): Response
    {
        return $this->render('option_api/index.html.twig', [
            'controller_name' => 'OptionApiController',
        ]);
    }
}

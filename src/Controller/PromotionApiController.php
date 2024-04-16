<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PromotionApiController extends AbstractController
{
    #[Route('/promotion/api', name: 'app_promotion_api')]
    public function index(): Response
    {
        return $this->render('promotion_api/index.html.twig', [
            'controller_name' => 'PromotionApiController',
        ]);
    }
}

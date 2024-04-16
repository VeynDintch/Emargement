<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SessionApiController extends AbstractController
{
    #[Route('/session/api', name: 'app_session_api')]
    public function index(): Response
    {
        return $this->render('session_api/index.html.twig', [
            'controller_name' => 'SessionApiController',
        ]);
    }
}

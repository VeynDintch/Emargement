<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UtilisateurApiController extends AbstractController
{
    #[Route('/utilisateur/api', name: 'app_utilisateur_api')]
    public function index(): Response
    {
        return $this->render('utilisateur_api/index.html.twig', [
            'controller_name' => 'UtilisateurApiController',
        ]);
    }
}

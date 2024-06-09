<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
class MenuController extends AbstractController
{   
    #[Route('/home', name: 'app_menu')]
    public function index(): Response
    {
        if ($this->isGranted('ROLE_PROFESSEUR')){
            return $this->render('menu/index.html.twig', [
                'controller_name' => 'Je suis un prof',
            ]);
        }
    
    if ($this->isGranted('ROLE_STAGIAIRE')){
        return $this->render('menu/index.html.twig', [
            'controller_name' => 'Je suis un Stagiaire',
        ]);
        }
    if ($this->isGranted('ROLE_ADMIN')){
        
        return $this->render('menu/index.html.twig', [
            'controller_name' => 'Je suis un Admin',
        ]);
        
        
        }
    } 
}
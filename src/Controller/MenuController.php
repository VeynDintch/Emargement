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
    
    if ($this->isGranted('ROLE_STAGAIRE')){
        return $this->render('menu/index.html.twig', [
            'controller_name' => 'Je suis un Stagiaire',
        ]);
        }
    if ($this->isGranted('ROLE_ADMIN')){
        $utilisateur = new Utilisateur();
        $formUser = $this->createForm(UtilisateurType::class, $utilisateur ,array(action($this->generateUrl('app_utilisateur_new'))));
        $session = new Session();
        $formSession = $this->createForm(SessionType::class, $session,arry(action($this->generateUrl('app_utilisateur_new'))));
        $Promotion = new Promotion();
        $formPromotion =  $this->createForm(PromotinType::class, $promotin,arry(action($this->generateUrl('app_promotion_new'))));
        return $this->render('menu/index.html.twig', [
            'controller_name' => 'Je suis un Admin',
        ]);

        
        }
    } 
}
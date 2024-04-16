<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SalleClassApiController extends AbstractController
{
    #[Route('/salle/class/api', name: 'app_salle_class_api')]
    public function index(): Response
    {
        return $this->render('salle_class_api/index.html.twig', [
            'controller_name' => 'SalleClassApiController',
        ]);
    }
}

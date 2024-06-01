<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Componenent\HttpFoundation\JsonReponse;
Use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\security\Http\Attribute\IsGranted;
use App\Repository\MatiereRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\SessionRepository;
use App\Repository\PromotionRepository;
use App\Repository\SalleClasseRepository;
use App\Repository\EmargerRepository;

 #[Route('/api', name: 'app_api')]
class ApiController extends AbstractController
{   
   
    #[Route('/api/matiere/{id}', name:"api_matiere_get", methods:['GET'])]
    public function getMatiere(Int $id, SerializerInterface $serializer, MatiereRepository $matiereRepository): JsonResponse
    {
        $matiere = $matiereRepository->find($id);
        if($matiere){
            $jsonMatiere = $serializer->serialize($matiere, 'json', ['groups' => 'getMatiere']);
            return new JsonResponse($jsonMatiere, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }


    #[Route('/api/utilisateur/{id}', name:"api_utilisateur_get", methods:['GET'])]
    public function getUtilisateur(Int $id, SerializerInterface $serializer, UtilisateurRepository $utilisateurRepository): JsonResponse
    {
        $utilisateur = $utilisateurRepository->find($id);
        if($utilisateur){
            $jsonUtilisateur = $serializer->serialize($utilisateur, 'json', ['groups' => 'getUtilisateur']);
            return new JsonResponse($jsonUtilisateur, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }

    #[Route('/api/session/{id}', name:"api_session_get", methods:['GET'])]
    public function getSession(Int $id, SerializerInterface $serializer, SessionRepository $sessionRepository): JsonResponse
    {
        $session = $sessionRepository->find($id);
        if($session){
            $jsonMatiere = $serializer->serialize($session, 'json', ['groups' => 'getSession']);
            return new JsonResponse($jsonSession, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }
    #[Route('/api/promotion/{id}', name:"api_promotion_get", methods:['GET'])]
    public function getPromotion(Int $id, SerializerInterface $serializer, PromotionRepository $promotionRepository): JsonResponse
    {
        $promotion = $promotionRepository->find($id);
        if($promotion){
            $jsonPromotion = $serializer->serialize($promotion, 'json', ['groups' => 'getPromotion']);
            return new JsonResponse($jsonPromotion, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }
    #[Route('/api/salleclasse/{id}', name:"api_salleclasse_get", methods:['GET'])]
    public function getSalleClasse(Int $id, SerializerInterface $serializer, SalleClasseRepository $salleClasseRepository): JsonResponse
    {
        $salleClasse = $salleClasseRepository->find($id);
        if($salleClasse){
            $jsonSalleClasse = $serializer->serialize($salleClasse, 'json', ['groups' => 'getSalleClasse']);
            return new JsonResponse($jsonSalleClasse, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }

    #[Route('/api/emarger/{id}', name:"api_emarger_get", methods:['GET', 'POST'])]
    public function getEmarger(Int $id, SerializerInterface $serializer, EmargerRepository $emargerRepository): JsonResponse
    {
        $emarger = $emargerRepository->find($id);
        if($emarger){
            $jsonEmarger = $serializer->serialize($emarger, 'json', ['groups' => 'getEmarger']);
            return new JsonResponse($jsonEmarger, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }
    #[IsGranted('ROLE_ADMIN', 'ROLE_PROFESSEUR')]
    #[Route('/api/emarger/{id}', name:"api_emarge_get", methods:['GET', 'POST', 'PUT'])]
    public function getEmarge(Int $id, SerializerInterface $serializer, EmargerRepository $emargerRepository): JsonResponse
    {
        $emarge = $emargerRepository->find($id);
        if($emarge){
            $jsonEmarge = $serializer->serialize($emarge, 'json', ['groups' => 'getEmerge']);
            return new JsonResponse($jsonEmarge, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);


    }

     #[Route('/api/formation/{id}', name:"api_formation_get", methods:['GET'])]
    public function getFormation(Int $id, SerializerInterface $serializer, FormationRepository $formationRepository): JsonResponse
    {
        $formation = $formationRepository->find($id);
        if($formation){
            $jsonFormation = $serializer->serialize($formation, 'json', ['groups' => 'getFormation']);
            return new JsonResponse($jsonEmarge, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);

    }


}
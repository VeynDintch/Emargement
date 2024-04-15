<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Repository\FormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class FormationApiController extends AbstractController
{
    #[Route('/Formation/Api', name: 'api_formation_list', methods: ['GET'])]
    public function getFormationList(FormationRepository $formationtRepository, SerializerInterface $serializer): JsonResponse
    {
        $formationList = $formationRepository->findAll();
        $jsonformationList = $serializer->serialize($formationList, 'json', ['groups' => 'getFormation']);
        return new JsonResponse($jsonFormationList, Response::HTTP_OK, [], true);
    }
    }
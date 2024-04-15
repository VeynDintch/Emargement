<?php

namespace App\Controller;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class EmergementApiController extends AbstractController
{
    #[Route('/Emergement/Api', name: 'api_emergement_list', methods: ['GET'])]
    public function getEmergementList(EmergementRepository $emergementRepository, SerializerInterface $serializer): JsonResponse
    {
        $emergementList = $emergementRepository->findAll();
        $jsonEmergementList = $serializer->serialize($emergementList, 'json', ['groups' => 'getEmergement']);
        return new JsonResponse($jsonEmergementList, Response::HTTP_OK, [], true);
    }
    }


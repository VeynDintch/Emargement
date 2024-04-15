<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Repository\MatiereRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class MatiereApiController extends AbstractController
{
 
    #[Route('/matiere/api', name: 'api_matiere_list', methods: ['GET'])]
    public function getMatiereList(MatiereRepository $matiereRepository, SerializerInterface $serializer): JsonResponse
    {
        $matiereList = $matiereRepository->findAll();
        $jsonMatiereList = $serializer->serialize($matiereList, 'json', ['groups' => 'getMatiere']);
        return new JsonResponse($jsonMatiereList, Response::HTTP_OK, [], true);
    }
    

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

    #[Route('/matiere', name: 'api_matiere_new', methods: ['POST'])]
    public function newMatiere(Request $request, SerializerInterface $serializer, EntityManagerInterface $em): JsonResponse
    {
        $matiere = $serializer->deserialize($request->getContent(), Matiere::class, 'json');
        $em->persist($matiere);
        $em->flush();
        $jsonMatiere = $serializer->serialize($matiere, 'json');
        return new JsonResponse($jsonMatiere, Response::HTTP_CREATED, [], true);
    }

    #[Route('/matiere/{id}', name:"api_matiere_update", methods:['PUT'])]
    public function updateMatiere(Request $request, SerializerInterface $serializer, Matiere $currentMatiere, EntityManagerInterface $em): JsonResponse
    {
        $updatedMatiere = $serializer->deserialize($request->getContent(),
                Matiere::class,
                'json',
                [AbstractNormalizer::OBJECT_TO_POPULATE => $currentMatiere]);
        $em->persist($updatedMatiere);
        $em->flush();
        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
   }
}
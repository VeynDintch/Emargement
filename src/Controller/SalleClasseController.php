<?php

namespace App\Controller;

use App\Entity\SalleClasse;
use App\Form\SalleClasseType;
use App\Repository\SalleClasseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\security\Http\Attribute\IsGranted;

#[Route('/salle/classe')]
#[IsGranted('ROLE_ADMIN')]
class SalleClasseController extends AbstractController
{
    #[Route('/', name: 'app_salle_classe_index', methods: ['GET'])]
    public function index(SalleClasseRepository $salleClasseRepository): Response
    {
        return $this->render('salle_classe/index.html.twig', [
            'salle_classes' => $salleClasseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_salle_classe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $salleClasse = new SalleClasse();
        $form = $this->createForm(SalleClasseType::class, $salleClasse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($salleClasse);
            $entityManager->flush();

            return $this->redirectToRoute('app_salle_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('salle_classe/new.html.twig', [
            'salle_classe' => $salleClasse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_salle_classe_show', methods: ['GET'])]
    public function show(SalleClasse $salleClasse): Response
    {
        return $this->render('salle_classe/show.html.twig', [
            'salle_classe' => $salleClasse,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_salle_classe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SalleClasse $salleClasse, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SalleClasseType::class, $salleClasse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_salle_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('salle_classe/edit.html.twig', [
            'salle_classe' => $salleClasse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_salle_classe_delete', methods: ['POST'])]
    public function delete(Request $request, SalleClasse $salleClasse, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salleClasse->getId(), $request->request->get('_token'))) {
            $entityManager->remove($salleClasse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_salle_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}

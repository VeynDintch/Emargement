<?php

namespace App\Controller;

use App\Entity\Emarger;
use App\Form\EmargerType;
use App\Repository\EmargerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/emarger')]
class EmargerController extends AbstractController
{
    #[Route('/', name: 'app_emarger_index', methods: ['GET'])]
    public function index(EmargerRepository $emargerRepository): Response
    {
        return $this->render('emarger/index.html.twig', [
            'emargers' => $emargerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_emarger_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $emarger = new Emarger();
        $form = $this->createForm(EmargerType::class, $emarger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($emarger);
            $entityManager->flush();

            return $this->redirectToRoute('app_emarger_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('emarger/new.html.twig', [
            'emarger' => $emarger,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_emarger_show', methods: ['GET'])]
    public function show(Emarger $emarger): Response
    {
        return $this->render('emarger/show.html.twig', [
            'emarger' => $emarger,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_emarger_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Emarger $emarger, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmargerType::class, $emarger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_emarger_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('emarger/edit.html.twig', [
            'emarger' => $emarger,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_emarger_delete', methods: ['POST'])]
    public function delete(Request $request, Emarger $emarger, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$emarger->getId(), $request->request->get('_token'))) {
            $entityManager->remove($emarger);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_emarger_index', [], Response::HTTP_SEE_OTHER);
    }
}

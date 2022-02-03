<?php

namespace App\Controller\Admin;

use App\Entity\Resto;
use App\Form\RestoType;
use App\Repository\RestoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/resto', name: 'resto_',)]
class RestoController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(RestoRepository $restoRepository): Response
    {
        return $this->render('admin/resto/index.html.twig', [
            'restos' => $restoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $resto = new Resto();
        $form = $this->createForm(RestoType::class, $resto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($resto);
            $entityManager->flush();

            return $this->redirectToRoute('admin_resto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/resto/new.html.twig', [
            'resto' => $resto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Resto $resto): Response
    {
        return $this->render('admin/resto/show.html.twig', [
            'resto' => $resto,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Resto $resto, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RestoType::class, $resto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_resto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/resto/edit.html.twig', [
            'resto' => $resto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Resto $resto, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resto->getId(), $request->request->get('_token'))) {
            $entityManager->remove($resto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_resto_index', [], Response::HTTP_SEE_OTHER);
    }
}

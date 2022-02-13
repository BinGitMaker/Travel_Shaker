<?php

namespace App\Controller;

use App\Entity\Resto;
use App\Form\RestoType;
use App\Repository\RestoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/resto')]
class RestoController extends AbstractController
{
    #[Route('/', name: 'resto_index', methods: ['GET'])]
    public function index(RestoRepository $restoRepository): Response
    {
        return $this->render('resto/index.html.twig', [
            'restos' => $restoRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'resto_show', methods: ['GET'])]
    public function show(Resto $resto): Response
    {
        return $this->render('resto/show.html.twig', [
            'resto' => $resto,
        ]);
    }
}

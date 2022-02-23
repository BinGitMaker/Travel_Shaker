<?php

namespace App\Controller;

use App\Entity\City;
use App\Entity\Resto;
use App\Form\RestoType;
use App\Repository\RestoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/resto', name: 'resto_')]
class RestoController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(
        RestoRepository $restoRepository,
        Resto $resto,
        City $city,
        ): Response
    {
        return $this->render('resto/index.html.twig', [
            'restos' => $restoRepository->findByCity(),
            'resto' => $resto,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Resto $resto): Response
    {
        return $this->render('resto/show.html.twig', [
            'resto' => $resto,
        ]);
    }
}

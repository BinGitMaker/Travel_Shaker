<?php

namespace App\Controller;

use App\Entity\City;
use App\Repository\CityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/city', name: 'city_')]

class CityController extends AbstractController
{
    #[Route('/{id}', name: 'show')]
    public function show(
        City $city,
        CityRepository $cityRepository,
        ): Response
    {
        return $this->render('city/show.html.twig', [
            'city' => $city,
        ]);
    }    
}

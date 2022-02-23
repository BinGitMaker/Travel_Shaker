<?php

namespace App\Controller;

use App\Entity\City;
use App\Form\CityType;
use App\Entity\Country;
use App\Repository\CityRepository;
use App\Repository\HotelRepository;
use App\Repository\RestoRepository;
use App\Repository\ActivityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/city', name: 'city_')]
class CityController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(
        CityRepository $cityRepository, 
        City $city,
        Country $country,
        ): Response
    {
        return $this->render('city/index.html.twig', [
            'cities' => $cityRepository->findByCountry(),
            'city' => $city,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(
        City $city, 
        ActivityRepository $activityRepository,
        HotelRepository $hotelRepository,
        RestoRepository $restoRepository,
        ): Response
    {
        return $this->render('city/show.html.twig', [
            'city' => $city,
            'activities' => $activityRepository->findBy(array('city' => $city)),
            'hotels' => $hotelRepository->findBy(array('city' => $city)),
            'restos' => $restoRepository->findBy(array('city' => $city)),
        ]);
    }
}

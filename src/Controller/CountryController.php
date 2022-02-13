<?php

namespace App\Controller;

use App\Entity\Country;
use App\Entity\City;
use App\Form\CountryType;
use App\Form\CityType;
use App\Repository\CountryRepository;
use App\Repository\CityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/country', name: 'country_')]
class CountryController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(
        CountryRepository $countryRepository,
        ): Response
    {
        return $this->render('country/index.html.twig', [
            'countries' => $countryRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(
        Country $country,
        CityRepository $cityRepository,
        ): Response
    {
        return $this->render('country/show.html.twig', [
            'country' => $country,
            'cities' => $cityRepository->findAll(),
        ]);
    }
}

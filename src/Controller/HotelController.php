<?php

namespace App\Controller;

use App\Entity\City;
use App\Entity\Hotel;
use App\Form\HotelType;
use App\Repository\HotelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/hotel', name: 'hotel_')]
class HotelController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(
        HotelRepository $hotelRepository,
        Hotel $hotel,
        City $city,
        ): Response
    {
        return $this->render('hotel/index.html.twig', [
            'hotels' => $hotelRepository->findByCity(),
            'hotel' => $hotel,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Hotel $hotel): Response
    {
        return $this->render('hotel/show.html.twig', [
            'hotel' => $hotel,
        ]);
    }
}

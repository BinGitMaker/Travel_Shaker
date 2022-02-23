<?php

namespace App\Controller;

use App\Entity\City;
use App\Entity\Activity;
use App\Form\ActivityType;
use App\Repository\ActivityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/activity', name: 'activity_')]
class ActivityController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(
        ActivityRepository $activityRepository,
        Activity $activity,
        City $city,
        ): Response
    {
        return $this->render('activity/index.html.twig', [
            'activities' => $activityRepository->findByCity(),
            'activity' => $activity,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Activity $activity): Response
    {
        return $this->render('activity/show.html.twig', [
            'activity' => $activity,
        ]);
    }
}

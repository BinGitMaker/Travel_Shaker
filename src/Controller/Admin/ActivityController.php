<?php

namespace App\Controller\Admin;

use App\Entity\Activity;
use App\Form\ActivityType;
use App\Entity\City;
use App\Repository\ActivityRepository;
use App\Repository\CityRepository;
use Doctrine\ORM\EntityManager;
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
        CityRepository $cityRepository,
        ActivityRepository $activityRepository
        ): Response
    {
        return $this->render('admin/activity/index.html.twig', [
            'activities' => $activityRepository->findAll(),
            'cities' => $cityRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(
        Request $request, 
        EntityManagerInterface $entityManager
        ): Response
    {
        $activity = new Activity();
        $form = $this->createForm(ActivityType::class, $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($activity);
            $entityManager->flush();

            return $this->redirectToRoute('admin_activity_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/activity/new.html.twig', [
            'activity' => $activity,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Activity $activity, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActivityType::class, $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_activity_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/activity/edit.html.twig', [
            'activity' => $activity,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Activity $activity, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$activity->getId(), $request->request->get('_token'))) {
            $entityManager->remove($activity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_activity_index', [], Response::HTTP_SEE_OTHER);
    }
}

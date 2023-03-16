<?php

namespace App\Controller;

use App\Form\ReservationType;
use App\Controller\SecurityController;
use App\Entity\Reservation;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReservationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    
    #[Route('/reservation', name: 'reservation')]
    public function reserve(
        Request $request,
        EntityManagerInterface $entitymanager,
        ManagerRegistry $doctrine,
        ReservationRepository $reservationRepository,
        SecurityController $security
        ): Response
    {

        //gestion des entités
        $entitymanager = $doctrine->getManager();
        $reservation = new Reservation();
        
        $form = $this->createForm(ReservationType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement des données de réservation

            return $this->redirectToRoute('app_home');
        }

        return $this->render('reservation/reserve.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/reservationAPI', name: 'app_reservationAPI', methods: ['POST', 'GET'])]
    public function API(
        Request $request,
        ManagerRegistry $doctrine,
        EntityManagerInterface $entitymanager,
        ReservationRepository $restaurantrepository,
    ): JsonResponse
    {
        $entityManager = $doctrine->getManager(); // Gère les entités.

        $reservation = new Reservation();

        $form = $this->createForm(ReservationType::class, $reservation);

        //Récupère les infos du formulaire 
        // $form->handleRequest($request); 

        return $this->redirectToRoute('app_home');
        return new JsonResponse([
            'status' =>'ok',
            'message' => 'ReservationController::information',
        ]);
    }

    // /**
    //  * @Route("/reservation/success", name="reservation_success")
    //  */
    // public function success()
    // {
    //     return $this->render('reservation/success.html.twig');
    // }
    
}
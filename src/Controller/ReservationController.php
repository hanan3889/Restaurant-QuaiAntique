<?php

namespace App\Controller;

use App\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation", name="reservation")
     */
    public function reserve(Request $request)
    {
        $form = $this->createForm(ReservationType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement des données de réservation

            return $this->redirectToRoute('reservation_success');
        }

        return $this->render('reservation/reserve.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/reservation/success", name="reservation_success")
     */
    public function success()
    {
        return $this->render('reservation/success.html.twig');
    }
}
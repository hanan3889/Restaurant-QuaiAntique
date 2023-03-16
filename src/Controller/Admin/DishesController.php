<?php

namespace App\Controller\Admin;

use App\Entity\Dishes;
use App\Form\DishesFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/plats', name: 'admin_dishes')]
class DishesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
      return $this->render('admin/dishes/index.html.twig');
    }
    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
      $this->denyAccessUnlessGranted('ROLE_ADMIN');

      //on crée un nouveau "plat"
      $dishes = new Dishes();

      //on crée le formulaire
      $dishesform = $this->createForm(DishesFormType::class,
      $dishes
    );

      //on traite la requête du formulaire
      $dishesform->handleRequest($request);

      //on vérifie si le formulaire est soumis ET valide
      if ($dishesform->isSubmitted() && $dishesform->isValid()) {

        //on divisie le prix
        $prix = $dishes->getPrice() / 100;
        $dishes->setPrice($prix);

        //on stocke
        $em->persist($dishes);
        $em->flush();

        //on affiche un message d'alert
        $this->addFlash('succes', 'Plat ajouté avec succès');
      }

      return $this->render('admin/dishes/add.html.twig', [
        'dishesForm'=>$dishesform->createView()
      ]);

      return $this->render('admin/dishes/index.html.twig');

    }
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Dishes $dishes, Request $request,
    EntityManagerInterface $em): Response
    {
      //on verifie si l'utilisateur peut modifier avec le voter
      $this->denyAccessUnlessGranted('DISHES_EDIT', $dishes);

      //on multiplie le prix par 100
      $prix = $dishes->getPrice() * 100;
      $dishes->setPrice($prix);

      //on crée le formulaire
      $dishesform = $this->createForm(DishesFormType::class,
      $dishes
    );

    //on traite la requête du formulaire
    $dishesform->handleRequest($request);

    //on vérifie si le formulaire est soumis ET valide
    if ($dishesform->isSubmitted() && $dishesform->isValid()) {

      //on divisie le prix
      $prix = $dishes->getPrice() / 100;
      $dishes->setPrice($prix);

      //on stocke
      $em->persist($dishes);
      $em->flush();

      //on affiche un message d'alert
      $this->addFlash('succes', 'Plat ajouté avec succès');
    }
    return$this->render('admin/dishes/edit.html.twig', [
      'dishesForm' => $dishesform->createView()
    ]);

      return $this->render('admin/dishes/edit.html.twig');
    }

    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(Dishes $dishes): Response
    {
      //on verifie si l'utilisateur peut supprimer avec le voter
      $this->denyAccessUnlessGranted('DISHES_DELETE', $dishes);
      return $this->render('admin/dishes/index.html.twig');
    }
}
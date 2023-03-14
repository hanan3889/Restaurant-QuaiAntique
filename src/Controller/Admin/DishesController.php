<?php

namespace App\Controller\Admin;

use App\Entity\Dishes;
use symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/plats', name: 'admin_dishes')]
class DishesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
      return $this->render('admin/dishes/index.html.twig');
    }
    #[Route('/ajout', name: 'add')]
    public function add(): Response
    {
      $this->denyAccessUnlessGranted('ROLE_ADMIN');
      return $this->render('admin/dishes/index.html.twig');
    }
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Dishes $dishes): Response
    {
      //on verifie si l'utilisateur peut modifier avec le voter
      $this->denyAccessUnlessGranted('DISHES_EDIT', $dishes);
      return $this->render('admin/dishes/index.html.twig');
    }
    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Dishes $dishes): Response
    {
      //on verifie si l'utilisateur peut supprimer avec le voter
      $this->denyAccessUnlessGranted('DISHES_DELETE', $dishes);
      return $this->render('admin/dishes/index.html.twig');
    }
}
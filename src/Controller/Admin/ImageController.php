<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/images', name: 'admin_images')]
class ImageController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
      return $this->render('admin/images/index.html.twig');
    }
    #[Route('/ajout', name: 'add')]
    public function add(): Response
    {
      $this->denyAccessUnlessGranted('ROLE_ADMIN');
      return $this->render('admin/images/index.html.twig');
    }
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Image $images): Response
    {
      //on verifie si l'utilisateur peut modifier avec le voter
      $this->denyAccessUnlessGranted('IMAGES_EDIT', $images);
      return $this->render('admin/dishes/index.html.twig');
    }
    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Image $images): Response
    {
      //on verifie si l'utilisateur peut supprimer avec le voter
      $this->denyAccessUnlessGranted('IMAGES_DELETE', $images);
      return $this->render('admin/images/index.html.twig');
    }
}
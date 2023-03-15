<?php

namespace App\Controller\Admin;

use App\Entity\OpenningHours;
use symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/horaires', name: 'admin_openning')]
class OpenningHoursController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
      return $this->render('admin/openninghours/index.html.twig');
    }
    #[Route('/ajout', name: 'add')]
    public function add(): Response
    {
      $this->denyAccessUnlessGranted('ROLE_ADMIN');
      return $this->render('admin/openninghours/index.html.twig');
    }
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(OpenningHours $open): Response
    {
      //on verifie si l'utilisateur peut modifier avec le voter
      $this->denyAccessUnlessGranted('OPEN_EDIT', $open);
      return $this->render('admin/openninghours/index.html.twig');
    }
    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(OpenningHours $open): Response
    {
      //on verifie si l'utilisateur peut supprimer avec le voter
      $this->denyAccessUnlessGranted('OPEN_DELETE', $open);
      return $this->render('admin/openninghours/index.html.twig');
    }
}
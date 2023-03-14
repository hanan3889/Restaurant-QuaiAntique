<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Form\MenuFormType;
use Doctrine\ORM\EntityManagerInterface;
use symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/menu', name: 'admin_menu')]
class MenuController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
      
      return $this->render('admin/menu/index.html.twig');
    }
    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
      $this->denyAccessUnlessGranted('ROLE_ADMIN');

      //on crée un "nouveau menu"
      $menu = new Menu();

      //on crée le formulaire
      $menuform = $this->createForm(MenuFormType::class, 
      $menu
    );
    //on traite la requête du formulaire
    $menuform->handleRequest($request);

    // dd($menuform);

      return $this->render('admin/menu/add.html.twig',[
        'menuForm'=> $menuform->createView()
      ]);


    }
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Menu $menu): Response
    {
      //on verifie si l'utilisateur peut modifier avec le voter
      $this->denyAccessUnlessGranted('MENU_EDIT', $menu);
      return $this->render('admin/menu/index.html.twig');
    }
    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Menu $menu): Response
    {
      //on verifie si l'utilisateur peut supprimer avec le voter
      $this->denyAccessUnlessGranted('MENU_DELETE', $menu);
      return $this->render('admin/menu/index.html.twig');
    }
}
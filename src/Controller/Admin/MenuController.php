<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Form\MenuFormType;
use Doctrine\ORM\EntityManagerInterface;
use symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/menu', name: 'admin_menu_')]
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

    //on vérifie si le formulaire est soumis ET valide
    if ($menuform->isSubmitted() && $menuform->isValid()) {

      //on divise le prix
      $prix = $menu->getPrice() / 100;
      $menu->setPrice($prix);

      //on stocke
      $em->persist($menu);
      $em->flush();

      //on affiche un message d'alert
      $this->addFlash('succes', 'Menu ajouté avec succès');
    }

    //on redirige
    // return$this->redirectToRoute('admin_menu_index');

      return $this->render('admin/menu/add.html.twig',[
        'menuForm'=> $menuform->createView()
      ]);

    }
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Menu $menu,Request $request, 
    EntityManagerInterface $em): Response
    {
      //on verifie si l'utilisateur peut modifier avec le voter
      $this->denyAccessUnlessGranted('MENU_EDIT', $menu);

      //on multiplie le prix par 100
      $prix = $menu->getPrice() * 100;
      $menu->setPrice($prix);


      //on crée le formulaire
      $menuform = $this->createForm(MenuFormType::class, 
      $menu
    );

    //on traite la requête du formulaire
    $menuform->handleRequest($request);

    //on vérifie si le formulaire est soumis ET valide
    if ($menuform->isSubmitted() && $menuform->isValid()) {

      //on divise le prix
      $prix = $menu->getPrice() / 100;
      $menu->setPrice($prix);

      //on stocke
      $em->persist($menu);
      $em->flush();

      //on affiche un message d'alert
      $this->addFlash('succes', 'Menu modifié avec succès');
    }

    //on redirige
    // return $this->redirectToRoute('admin_menu_index');

      return $this->render('admin/menu/edit.html.twig',[
        'menuForm'=> $menuform->createView()
      ]);

      return $this->render('admin/menu/edit.html.twig');
    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Menu $menu): Response
    {
      //on verifie si l'utilisateur peut supprimer avec le voter
      $this->denyAccessUnlessGranted('MENU_DELETE', $menu);
      return $this->render('admin/menu/index.html.twig');
    }
}
<?php

namespace App\Security\Voter;

use App\Entity\Menu;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class MenuVoter extends Voter
{
    const EDIT = 'MENU_EDIT';
    const DELETE = 'MENU_DELETE';

    private $security;

    public function __construct(Security $security)
    {
      $this->security = $security;
    }

    protected function supports(string $attribute, $menu): bool
    {

      if (!in_array($attribute, [self::EDIT, self::DELETE])){
        return false;
      }
      if (!$menu instanceof Menu){

        return false;
      }
      return true;

      // return in_array($attribute, [self::EDIT, self::DELETE]) &&
      // $menu instanceof Menu;
    }

    protected function voteOnAttribute($attribute, $menu, 
    TokenInterface $token): bool
    {
      //on récupère l'utilisateur à partir du token
      $user = $token->getUser();
      
      if (!$user instanceof UserInterface) return false;
      

      //on vérifie si l'utilisateur est admin
      if($this->security->isGranted('ROLE_ADMIN')) return true;

      // on vérifie les permissions
      switch($attribute) {
        case self::EDIT:
          //on vérifie si l'utilisateur peut modifier
          return $this->canEdit();
          break;
          //on vérifie si l'utilisateur peut supprimer
        case self::DELETE:
          return $this->canDelete();
          break;
      }
    }

    private function canEdit(){
      return $this->security->isGranted('ROLE_ADMIN');
    }

    private function canDelete(){
      return $this->security->isGranted('ROLE_ADMIN');
    }
}
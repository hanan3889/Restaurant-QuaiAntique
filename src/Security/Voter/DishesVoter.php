<?php

namespace App\Security\Voter;

use App\Entity\Dishes;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class DishesVoter extends Voter
{
  const EDIT = 'DISHES_EDIT';
  const DELETE = 'DISHES_DELETE';

  private $security;
  
  public function __construct(Security $security)
  {
    $this->security = $security;
  }

  protected function supports(string $attribute, $dishes): bool
  {

    if (!in_array($attribute, [self::EDIT, self::DELETE])){
      return false;
    }
    if (!$dishes instanceof Dishes){

      return false;
    }
    return true;

    // return in_array($attribute, [self::EDIT, self::DELETE]) &&
    // $dishes instanceof Dishes;
  }

  protected function voteOnAttribute($attribute, $dishes, 
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
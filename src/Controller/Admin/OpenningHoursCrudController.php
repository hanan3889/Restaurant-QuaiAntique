<?php

namespace App\Controller\Admin;

use App\Entity\OpenningHours;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OpenningHoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpenningHours::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            

            ->setPageTitle("index","Quai Antique - Administration des heures d'ouvertures");
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    
}

<?php

namespace App\Controller\AdminEstablishment;

use App\Entity\Establishment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EstablishmentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Establishment::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}

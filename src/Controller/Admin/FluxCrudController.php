<?php

namespace App\Controller\Admin;

use App\Entity\Flux;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FluxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Flux::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Flux'),
            TextField::new('URL'),
            AssociationField::new('Screen'),
        ];
    }
}

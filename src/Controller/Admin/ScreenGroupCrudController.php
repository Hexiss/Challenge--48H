<?php

namespace App\Controller\Admin;

use App\Entity\ScreenGroup;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ScreenGroupCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ScreenGroup::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('ScreenId'),
            AssociationField::new('GroupId'),
        ];
    }
}

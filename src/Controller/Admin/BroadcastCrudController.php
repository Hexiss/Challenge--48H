<?php

namespace App\Controller\Admin;

use App\Entity\Broadcast;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BroadcastCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Broadcast::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('ScreenId'),
        ];
    }
}

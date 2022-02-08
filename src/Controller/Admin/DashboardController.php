<?php

namespace App\Controller\Admin;

use App\Entity\Flux;
use App\Entity\Group;
use App\Entity\Media;
use App\Entity\Screen;
use App\Entity\Playlist;
use App\Entity\Broadcast;
use App\Entity\ScreenGroup;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/', name: 'admin')]
    public function index(): Response
    {
    return $this->render('/Dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Challenge48H');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Groupe', 'fa fa-home', Group::class );
        yield MenuItem::linkToCrud('Ecrans', 'fa fa-home', Screen::class );
        yield MenuItem::linkToCrud('Broadcast', 'fa fa-home', Broadcast::class );
        yield MenuItem::linkToCrud('GroupeEcrans', 'fa fa-home', ScreenGroup::class );
        yield MenuItem::linkToCrud('Medias', 'fa fa-home', Media::class );
        yield MenuItem::linkToCrud('Playlist', 'fa fa-home', Playlist::class );
        yield MenuItem::linkToCrud('Flux', 'fa fa-home', Flux::class );
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}

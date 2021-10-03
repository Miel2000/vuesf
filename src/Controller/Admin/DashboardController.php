<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ArticleCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     * 
     */
    public function index(): Response
    {
        // $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        // return $this->redirect($routeBuilder->setController(ArticleCrudController::class)->generateUrl());
        // // return parent::index();
        return $this->render('bundles/easyadmin/welcome.html.twig', []);
    }

    public function configureMenuItems(): iterable
    {
       yield MenuItem::section('Important');
       yield MenuItem::linkToCrud('Article', 'fa fa-file-pdf', Article::class);
    }

}

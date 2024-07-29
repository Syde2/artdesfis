<?php

namespace App\Controller\Admin;
use App\Entity\Produits;
use App\Entity\Contact;
use App\Repository\ProduitsRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[IsGranted('ROLE_USER')]
class DashboardController extends AbstractDashboardController
{
    private ProduitsRepository $produitRepository;

    public function __construct(ProduitsRepository $produitsRepository)
    {
        $this->produitRepository = $produitsRepository;

    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {        
        $total = count( $this->produitRepository->findAll());
        $visible = count( $this->produitRepository->findBy(array('visible' => True)));
        $ruptureStock = count( $this->produitRepository->findBy(array('stock' => 0)));


        return $this->render('dashboard/index.html.twig', [
            'totalArticles' => $total,
            'totalVisible' => $visible,
            'totalRuptureStock' => $ruptureStock,

        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Art des Fils');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de Bord', 'fa fa-dashboard');

        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Produits::class);
        yield MenuItem::linkToCrud('Contacts', 'fas fa-list', Contact::class);
    }

    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);

    }
}

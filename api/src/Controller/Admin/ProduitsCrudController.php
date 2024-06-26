<?php

namespace App\Controller\Admin;

use App\Entity\Produits;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Symfony\Component\Security\Http\Attribute\IsGranted;



#[IsGranted('ROLE_USER')]
class ProduitsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produits::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [

            FormField::addFieldset('Nouveau Produit')
            ->setIcon('cart-plus')->addCssClass('optional'),
                TextField::new('nom')->setColumns(6),
                NumberField::new('stock')->setColumns(2),
         


                ImageField::new('imageUrl', 'Image')
                ->setColumns(6)
                ->setBasePath('uploads/images')
                ->setUploadDir('public/uploads/images'),

                MoneyField::new('prix')
                ->setColumns(2)
                ->setStoredAsCents()
                ->setCurrency('EUR'),
    
                TextareaField::new('description')
                ->setColumns(8)
                ->stripTags(),
            


            FormField::addFieldset('Images supplémentaires')
            ->setIcon('image')->addCssClass('optional')->renderCollapsed(),
       
                ImageField::new('imageUrl2', '2e image')
                ->setBasePath('uploads/images')
                ->setUploadDir('public/uploads/images')
                ->hideOnIndex(),
                ImageField::new('imageUrl3',' 3e image')
                ->setBasePath('uploads/images')
                ->setUploadDir('public/uploads/images')
                ->hideOnIndex(),
                



            FormField::addFieldset('Autres')
            ->renderCollapsed()
            ->setIcon('circle-info')->addCssClass('optional'),
            BooleanField::new('visible', "Visible sur le catalogue")->setColumns(6),







        
        ];
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(BooleanFilter::new('stock'))
        ;
    }
    
}

<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\Produits;


class AppFixtures extends Fixture
{
    private $userPasswordHasherInterface;
    private string $publicDir;

    public function __construct (UserPasswordHasherInterface $userPasswordHasherInterface, $publicDir) 
    {
        $this->publicDir = $publicDir;
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }

    public function load(ObjectManager $manager): void
    {
        //  $ZeroDechet = new Categories();
        //  $ZeroDechet->setNom('Zero Dechet');
        //  $ZeroDechet->setCouleur('green');
        //  $manager->persist($ZeroDechet);

        //  $Enfant = new Categories();
        //  $Enfant->setNom('Enfant');
        //  $Enfant->setCouleur('blue');
        //  $manager->persist($Enfant);

        //  $AccessoireMode = new Categories();
        //  $AccessoireMode->setNom('Accessoire Mode');
        //  $AccessoireMode->setCouleur('violet');
        //  $manager->persist($AccessoireMode);

        //  $Utilisateur = new User();
        //  $Utilisateur->setUsername('agicq');
        //  $Utilisateur->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        //  $Utilisateur->setPassword( $this->userPasswordHasherInterface->hashPassword(
        //         $Utilisateur, ''
        //     ));
        // $manager->persist($Utilisateur);

        $csvFile = $this->publicDir. '/catalog_products.csv';
        $csvData = array_map('str_getcsv', file($csvFile));
        
        $headers = array_shift($csvData);
        
        foreach ($csvData as $row) {
            $data = array_combine($headers, $row);
            
            $produit = new Produits();
            $produit->setNom($data['name']);
            $description =  strip_tags(  $data['description']);
            $description = str_replace('&nbsp;', ' ', $description);
            $produit->setDescription($description );
            
            // Gestion des URLs d'images
            $imageUrls = explode(';', $data['productImageUrl']);
            if (!empty($imageUrls[0])) $produit->setImageUrl($imageUrls[0]);
            if (!empty($imageUrls[1])) $produit->setImageUrl2($imageUrls[1]);
            if (!empty($imageUrls[2])) $produit->setImageUrl3($imageUrls[2]);
            
            $produit->setPrix($data['price']*100);
            $produit->setStock((int)$data['inventory']);
            
            $categoryName = $data['collection'];
            if (stripos($categoryName, 'bébé / enfant') !== false) {
                $categoryName = 'Enfant';
            }
            if (stripos($categoryName, 'zero dechet') !== false) {
                $categoryName = 'Zero Dechet';
            }
            if (stripos($categoryName, 'accessoires mode') !== false) {
                $categoryName = 'Accessoire Mode';
            }

            if (strpos($categoryName, ';') !== false) {
                $categoryName= 'Accessoire Mode';
            }

            $categorie = $manager->getRepository(Categories::class)->findOneBy(['nom' => $categoryName]);
            $produit->setCategorie($categorie);
            
            $produit->setTag($data['ribbon']);
            
            $manager->persist($produit);
        }




        $manager->flush(); 
    }
}

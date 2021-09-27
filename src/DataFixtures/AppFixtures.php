<?php

namespace App\DataFixtures;

use App\Entity\Panier;
use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i < 20; $i++) { 

            $produit = new Produit();
            $produit->setNom('produit'.$i);
            $produit->setDescription('description '.$i);
            $produit->setPrix(mt_rand(10, 100));
            $produit->setStock(mt_rand(10, 100));
            $produit->setPhoto('photo');
        }
        // for ($i=0; $i < 10; $i++) { 
        //     $panier = new Panier();
        //     $panier->setDateAchat(mt_rand(10, 30));
        //     $panier->setEtat();
        // }
        

        $manager->flush();
    }
}

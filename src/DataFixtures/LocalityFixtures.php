<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Locality;

class LocalityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $localities = [
            ['postal_code'=>'1000','locality'=>'Bruxelles'],
            ['postal_code'=>'1020','locality'=>'laeken'],
            ['postal_code'=>'1030','locality'=>'Schaerbeek'],
            ['postal_code'=>'1050','locality'=>'Ixelles'],
            ['postal_code'=>'1170','locality'=>'Watermal-Boitfort'],
        ];
        // $product = new Product();
        // $manager->persist($product);
        foreach($localities as $data) {
            $locality = new Locality();

            $locality->setPostalCode($data['postal_code']);
            $locality->setLocality($data['locality']);

            $manager->persist($locality);
        }

        $manager->flush();
    }
}

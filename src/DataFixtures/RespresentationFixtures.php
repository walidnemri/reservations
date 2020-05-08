<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Representation;

class RespresentationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $representations = [
            [
                'the_location'=>'espace-delvaux-la-venerie',
                'the_show'=>'ayiti',
                'schedule'=>'2012-10-12 13:30',
            ],
            [
                'the_location'=>'dexia-art-center',
                'the_show'=>'ayiti',
                'schedule'=>'2012-10-12 20:30',
            ],
            [
                'the_location'=>'dexia-art-center',
                'the_show'=>'cible-mouvante',
                'schedule'=>'2012-10-02 20:30',
            ],
            [
                'the_location'=>'dexia-art-center',
                'the_show'=>'ceci-n-est-pas-un-chanteur-belge',
                'schedule'=>'2012-10-16 20:30',
            ],
        ];
        
        foreach($representations as $data) {
            $representation = new Representation();

            if($data['the_location']) {
                $representation->setTheLocation($this->getReference($data['the_location']));
            }
            
            //$representation->setTheLocation($this->getReference($data['the_location']));
            $representation->setTheShow($this->getReference($data['the_show']));
            $representation->setSchedule(new \DateTime($data['schedule']));

            $manager->persist($representation);
        }

        // $product = new Product();
         

        $manager->flush();
    }

    public function getDependencies() {
        return [
            LocationFixture::class,
            ShowFixtures::class,
        ];
    }
}

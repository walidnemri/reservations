<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Role;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $roles = [
            ['role'=>'admin'],
            ['role'=>'members'],
            ['role'=>'affiliate']
        ];
        // $product = new Product();
        // $manager->persist($product);
        foreach ($roles as $data){
            $role = new Role();

            $role->setRole($data['role']);
            $manager->persist($role);
        }

        $manager->flush();
    }
}

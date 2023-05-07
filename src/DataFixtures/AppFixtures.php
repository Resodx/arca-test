<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // UserFactory::createOne([
        //     'username' => 'admin',
        //     'password' => 'admin',
        //     'roles' => ['ROLE_MASTER'],
        // ]);
        // UserFactory::createMany(10, [
        //     'roles' => ['ROLE_USER'],
        // ]);

        $manager->flush();
    }
}

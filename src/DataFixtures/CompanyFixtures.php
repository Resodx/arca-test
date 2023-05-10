<?php

namespace App\DataFixtures;

use App\Factory\CompanyFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $category_repository = $manager->getRepository(Category::class)->findAll();

        $companies = CompanyFactory::new()->createMany(10);

        foreach ($companies as $company) {
            $company->addCategory($category_repository[array_rand($category_repository)]);
        }

        $manager->flush();
    }
}

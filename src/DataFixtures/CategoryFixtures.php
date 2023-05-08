<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\CategoryFactory;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $category_data = [
            'Auto',
            'Beauty and Fitness',
            'Entertainment',
            'Food and Dining',
            'Health',
            'Sports',
            'Travel'
        ];

        CategoryFactory::createMany(count($category_data), function (int $i) use ($category_data) {
            return [
                'name' => $category_data[$i - 1],
            ];
        });


        $manager->flush();
    }
}

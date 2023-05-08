<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setPassword($this->passwordHasher->hashPassword(
            $user,
            'admin'
        ));
        $user->setFirstName('Administrator');
        $user->setRoles(['ROLE_MASTER']);

        $manager->persist($user);
        $manager->flush();

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

<?php

namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;

class KernelTest extends KernelTestCase
{
    public function testKernel(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        // $routerService = static::getContainer()->get('router');
        // $myCustomService = static::getContainer()->get(CustomService::class);
    }
}

class WebTest extends WebTestCase
{
    public function testWeb(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseIsSuccessful();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUserName('admin');
        assert($testUser);
        assert($testUser->getPassword());
        assert($testUser->getRoles());
        
        $client->loginUser($testUser);

        $client->request('GET', '/admin/dashboard');
        $this->assertResponseIsSuccessful();

        $client->request('GET', '/admin/app/user/list');
        $this->assertResponseIsSuccessful();
    }
}

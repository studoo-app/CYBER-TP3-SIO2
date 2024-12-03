<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/home/Michel');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello Michel');
    }
}

<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SingleWebTest extends WebTestCase
{
    public function testWithPoint(): void
    {
        $client = static::createClient();
        $client->request('GET', '/panther.html');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello !');
    }

    public function testWithoutPoint(): void
    {
        $client = static::createClient();
        $client->request('GET', '/panther');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello !');
    }
}

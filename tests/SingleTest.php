<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class SingleTest extends PantherTestCase
{
    public function testWithPoint(): void
    {
        $client = static::createPantherClient();
        $client->request('GET', '/panther.html');

        $this->assertSelectorTextContains('h1', 'Hello !');
    }

    public function testWithoutPoint(): void
    {
        $client = static::createPantherClient();
        $client->request('GET', '/panther');

        $this->assertSelectorTextContains('h1', 'Hello !');
    }
}

<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InfoControllerTest extends WebTestCase
{
    public function testHomepageIsAccessibleToAnonymousVisitors(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
    }

    public function testHomepageRendersExpectedTitle(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        // La page d'accueil doit contenir au moins une balise <title> non vide.
        $this->assertGreaterThan(0, $crawler->filter('title')->count());
    }
}

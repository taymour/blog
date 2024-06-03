<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use function Zenstruck\Foundry\faker;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 3; $i++) {
            $article = new Post();
            $article->setTitle(faker()->text(50));
            $article->setBody(faker()->text);
            $manager->persist($article);
        }

        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;


class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for($i = 1; $i <= 10 ; $i++) {
            $article = new Article();
            $article->setTitle("Titre numero $i")
                    ->setContent("Contenu lorem ipsomised long text area ")
                    ->setImage("https://placehold.it/300x300")
                    ->setCreatedAt(new \DateTimeImmutable());

                    $manager->persist($article);
        }
      

        $manager->flush();
    }
}

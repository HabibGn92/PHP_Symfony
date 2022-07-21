<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i=0; $i < 10; $i++) { 
            $article = new Article();
            $article->setTitle($faker->word())
                    ->setAuthor($faker->name())
                    ->setContent($faker->text())
                    ->setCreatedAt($faker->dateTime());
            $manager->persist($article);
            $manager->flush();
        }  
    }
}

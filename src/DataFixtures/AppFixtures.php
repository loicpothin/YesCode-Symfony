<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        // GESTION DES ARTICLES
        for($i=0; $i <=20 ; $i++){
        
            $article = new Article();
            
            $title = $faker->sentence(2);

            $image = "https://picsum.photos/400/300";

            $intro = $faker->paragraph(2);

            $content = '<p>' . implode('</p><p>',$faker->paragraphs(5)) . '</p>';

            $createdAt = $faker->dateTimeBetween('- 1 months');

            $article->setTitle($title)
                    ->setImage($image)
                    ->setIntro($intro)
                    ->setContent($content)
                    ->setCreatedAt($createdAt);

            $manager->persist($article);
            }

        $manager->flush();
    }
}

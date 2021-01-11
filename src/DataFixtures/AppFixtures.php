<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        

        for($i=0; $i < 10 ; $i++){
        
            $article = new Article();
            $article->setTitle("Article n°" . $i);
            $article->setIntro("Ceci est une super intro ");
            $article->setContent("<p>Je suis le 1er paragraphe</p>
                                  <p>Je suis le 2er paragraphe</p>
                                  <p>Je suis le 3er paragraphe</p>");
            $article->setImage("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4kKcl_0Pr4kQd-0enSrIkIjuGDvhFAxc2aw&usqp=CAU");
            $article->setCreatedAt(new \DateTime());

            $manager->persist($article);

        }

        $manager->flush();

        
    }
}

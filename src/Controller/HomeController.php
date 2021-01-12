<?php

namespace App\Controller;

use Faker;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

  /**
   * @Route("/", name="home_page")
   */

  public function index(ArticleRepository $repo): Response
  {
    $articles = $repo->findLastArticles(3);

    // librairie Faker (telechager ds le terminal en --dev )
    $faker = Faker\Factory::create('fr_FR');

    // $intro = $faker->sentence(2);

    // $intro = $faker->paragraphs(2);

    // $contenu = ["pomme", "poire", "figue", "grenade", "peche"];

    $content = "<p>" . implode("</p><p>" , $faker->paragraphs(8)) . "<p>";

    $createdAt = $faker->dateTimeBetween(' - 3 months');
  
    dump( $createdAt);

    // lorem Picsum génere des photo en boucle 
    $image = "https://picsum.photos/400/300";


    return $this->render('home/index.html.twig', [
      "articles" => $articles,
      "image" => $image,
      "content" => $content
    ]);
  }
}

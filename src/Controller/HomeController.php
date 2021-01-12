<?php

namespace App\Controller;


use App\Repository\ArticleRepository;
use Cocur\Slugify\Slugify;
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

    $article =$repo->findOneById(55);

    $slugify = new Slugify();

    $slug = $slugify->slugify($article->getTitle(). time());

    dump($slug);

    return $this->render('home/index.html.twig', [
      "articles" => $articles,
      
    ]);
  }
}

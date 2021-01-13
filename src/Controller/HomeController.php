<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
  /**
   *  *****************************************
     * ROUTE QUI DIRIGE VERS LA PAGE D'ACCUEIL 
     * ****************************************
   * 
   *
   * @Route("/", name="home_page")
   */

  public function index(ArticleRepository $repo): Response
  {
    $articles = $repo->findLastArticles(3);
    
    return $this->render('home/index.html.twig', [
      "articles" => $articles,
      
    ]);
  }
}

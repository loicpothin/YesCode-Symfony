<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles_index")
     */

    public function index(ArticleRepository $repo): Response
    {
        $articles= $repo->findAll();
       

        return $this->render('article/index.html.twig', [
            'articles' => $articles
        ]);
    }

    
      /**
     * @Route("/articles/new", name="article_create")
     */
    public function create(): Response
    {

        return $this->render('article/create.html.twig', [
          
        ]);
    }


    /**
     * @Route("/articles/{slug}", name="article_show")
     */
    public function show($slug, ArticleRepository $articleRepository): Response
    {
        $article = $articleRepository->findOneBySlug($slug);

        return $this->render('article/show.html.twig', [
            'article' => $article
        ]);
    }


   


}

    

    


<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    

    
}

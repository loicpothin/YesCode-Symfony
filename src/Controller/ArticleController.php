<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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
     * Route qui dirige vers le formulaire 
     * 
     * @Route("/articles/new", name="article_create")
     */
    public function create(Request $request, EntityManagerInterface $manager): Response
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('article_show',[
                'slug' => $article->getSlug()

            ]);
        }

        return $this->render('article/create.html.twig', [
            'form' => $form->createView()
          
        ]);
    }

        
    /**
     * Route qui dirige vers l'article 
     * 
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

    

    


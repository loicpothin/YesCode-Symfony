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
     * *****************************************
     * ROUTE QUI DIRIGE VERS LA PAGE D''ARTICLE 
     * *****************************************
   * 
     * 
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
     * **************************************
     * ROUTE QUI DIRIGE VERS LE FORMULAIRE 
     * **************************************
     * 
     * @Route("/articles/new", name="article_create")
     */
    public function create(Request $request, EntityManagerInterface $manager): Response{
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
           
            $manager->persist($article);

            $manager->flush();

            $this->addFlash('success',
                             "L'article <strong>{$article->getTitle()}</strong> a bien été créé");
            

            return $this->redirectToRoute('article_show',
            [

                'slug' => $article->getSlug()

            ]);
        }

        return $this->render('article/create.html.twig',
        [
            'form' => $form->createView()
          
        ]);
    }

        
    /**
      **************************************
     * ROUTE QUI DIRIGE VERS L'ARTICLE  
     * **************************************
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

    /**
     * **************************************
     * ROUTE QUI DIRIGE VERS EDIT 
     * **************************************
     * 
     * @Route("/articles/{slug}/edit", name="article_edit")
     */
    public function edit(Request $request, Article $article, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($article);
            $manager->flush();

            $this->addFlash('info', 
                            "L'article <strong>{$article->getTitle()}</strong> a bien été modifié");

            return $this->redirectToRoute('article_show' , [
                'slug' => $article->getSlug()
            ]);
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView()
        ]);
    
    }


    /**
     * **************************************
     * ROUTE QUI DIRIGE VERS DELETE
     * **************************************
     * 
     * @Route("/articles/{slug}/delete", name="article_delete")
     */
    public function delete( EntityManagerInterface $manager, Article $article ): Response
    {
        $manager->remove($article);
        $manager->flush();
        
        $this->addFlash('danger', "L'article à bien été supprimer" );

            return $this->redirectToRoute('articles_index');
    }

}


   




    

    


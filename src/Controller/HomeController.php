<?php

namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */

     public function index(): Response
      {
         return $this->render('home/index.html.twig',[
             
             
         ]);
     }

     /**
     * @Route("/articles", name="articles_list")
     */

    public function articlesList()
    {
       return $this->render('home/articles.list.html.twig',[
           
       ]);
   }
}

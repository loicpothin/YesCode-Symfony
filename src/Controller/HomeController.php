<?php

namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */

     public function index(): Response
      {
          $city = "gotham";
          
         return $this->render('home/index.html.twig',[
             'name' => "Bienvenue",
             'city' => $city
           
         ]);
     }
}

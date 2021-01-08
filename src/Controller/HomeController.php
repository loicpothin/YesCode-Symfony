<?php

namespace App\Controller;

use App\Entity\Fruit;
use App\Repository\FruitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController{
    /**
    * @Route("/", name="home_page")
    */

    public function index(FruitRepository $repo): Response
    {
        $fruits = $repo->findAll();
        // 1er methode 
        //Permet d"afficher tous ce qu'il y dans la BBD dans le profiler (bas de page du site )
        dump($fruits);
        
      return $this->render('home/index.html.twig',[
        // 2er methode 
        // permet d'afficher tous ce qu'il y dans la BBD coté vue (page site)
        //  {{ dump(fruits) }} A ajouter coter vue donc dans index
        "fruits" => $fruits

      ]);
    }

     
}

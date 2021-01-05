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
        // je déclare une variable  php de type string 
        $author = "Lois Lane";

        // J'instancie un objet standard PHP sans class fait par nous même
        // je n'oublie pas l'import / NameSpaceRevolver -> plugin 
        $article = new stdClass();

        // j'attribue des propriétés à mon objet 
        $article ->title = "Théorie du complot 🧐🧐🧐";
        $article ->intro = "Fascine depuis des lustres ! on vous dit tout 🤪🤪🤪";
        $article ->content = "Bla bla bla , Pa pa pa , Po po po";
        
        // je file tout ça à ma vue pour l'afficher 
        return $this->render('home/index.html.twig', [
            'name' => "Page d'accueil",
            "article" => $article,
            "auteur" => $author
        ]);
    }
}

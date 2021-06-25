<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{


    // function find dans le repository 
    // requete spéciale pour récupérer les 3 


    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $bestSpots = [
            ['name' => ''],
            ['type' => ''],
            ['price_range' => ''],
        ];
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'bestSpots' => $bestSpots,
        ]);
    }
}

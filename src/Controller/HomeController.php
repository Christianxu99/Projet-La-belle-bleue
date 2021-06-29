<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EstablishmentRepository;

class HomeController extends AbstractController
{


    // function find dans le repository 
    // requete spéciale pour récupérer les 3 


  /**
     * @Route("/home", name="home")
     */
    public function index(EstablishmentRepository $establishmentRepository): Response
    {
        $establihment = $establishmentRepository->findAll();

        $bestSpots = [
            [
                'name' => 'Mon resto', 
                'photo' => '../images/ibiza-ibiza-ibiza-62fatUGp_KQ-unsplash.jpg',
                'type' => 'restaurant', 
                'price' => 3, 
                'note' => 1
            ],
            [
                'name' => 'Mon bar', 
                'photo' => '../images/charles-koh-gXhg_1NRWjE-unsplash.jpg',
                'type' => 'bar', 
                'price' => 1, 
                'note' => 3
            ],
            [
                'name' => 'Chez Momo', 
                'photo' => '../images/yalamber-limbu-qsfZP5C6L_g-unsplash.jpg',
                'type' => 'epicerie', 
                'price' => 2, 
                'note' => 5
            ],
        ];
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'bestSpots' => $bestSpots,
            'bestSpots' => $establihment
        ]);
    }
}

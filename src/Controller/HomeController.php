<?php

namespace App\Controller;

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
        $bestSpots = [
            ['name' => 'Mon bo resto'],
            ['name' => 'Un autre resto'],
            ['name' => 'Le dernier de la liste'],
        ];
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'bestSpots' => $bestSpots,
        ]);
    }
}

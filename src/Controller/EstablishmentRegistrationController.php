<?php

namespace App\Controller;

use App\Form\EstablishmentRegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EstablishmentRegistrationController extends AbstractController
{
    /**
     * @Route("/establishment/registration", name="establishment_registration")
     */
    public function index(): Response
    {
        return $this->render('establishment_registration/index.html.twig', [
            'controller_name' => 'EstablishmentRegistrationController',
        ]);
    }
}

/* 
public function registerEstablishment(Request $request): Response
{
    $form = $this->createForm(EstablishmentRegistrationType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // encode the plain password
        $user->setPassword(
            $passwordEncoder->encodePassword(
                $user,
                $form->get('plainPassword')->getData()
            )
        );

 */
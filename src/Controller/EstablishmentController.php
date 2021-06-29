<?php

namespace App\Controller;

use App\Entity\Establishment;
use App\Entity\User;
use App\Form\EstablishmentType;
use App\Form\EstablishmentForm2Type;
use App\Repository\EstablishmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Psr\Log\LoggerInterface;

/**
 * @Route("/establishment")
 */
class EstablishmentController extends AbstractController
{

    /**
     * @Route("/api/listplace", name="livre_index", methods={"GET"})
     */
    public function listPlaces(EstablishmentRepository $establishmentRepository): Response
    {

        $tabResult = array();

        $places = $establishmentRepository->findAll();
  
          foreach($places as $row){
  
              $tabResult[] = array('lat' => $row->getLatitude(), 'lng' => $row->getLongitude(), 'name'=>$row->getName());
          }

          return new JsonResponse($tabResult);
      }



    
    /**
     * @Route("/api/search/{query}", methods={"GET"})
     */
    public function search($query, EstablishmentRepository $establishmentRepository, LoggerInterface $logger)
    {
        //$this->denyAccessUnlessGranted("ROLE_USER");

        // $listAuteur = $auteurRepository->findBy(array(), array('nom' => 'DESC'));
        // $listAuteur = $auteurRepository->findAllArray();

        // $listAuteur = $auteurRepository->findAllArrayWithBooks($query);
        $establishment = $establishmentRepository->findAllArray($query);

        $logger->info($query);


        // return $this->json($listAuteur);
        return new JsonResponse($establishment);
    }



    /**
     * @Route("/", name="establishment_index", methods={"GET"})
     */
    public function index(EstablishmentRepository $establishmentRepository): Response
    {
        return $this->render('establishment/index.html.twig', [
            'establishments' => $establishmentRepository->findAll(),
        ]);
    }



    /**
     * @Route("/continueregisterpro/{id}", name="establishment_pro_register2", methods={"GET"})
     */
    public function register2(Request $request, EstablishmentRepository $establishmentRepository, User $user): Response
    {
        $establishment = new Establishment();
        $form = $this->createForm(EstablishmentForm2Type::class, $establishment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($establishment);
            $entityManager->flush();

            $user->addIdPro($establishment);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('establishment_pro_register3', ['id' => $establishment->getId()]);
        }

        return $this->render('establishment/new.html.twig', [
            'establishment' => $establishment,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/continueregisterpro/{id}", name="establishment_pro_register3", methods={"GET"})
     */
    public function register3(Request $request, EstablishmentRepository $establishmentRepository): Response
    {
        $establishment = new Establishment();
        $form = $this->createForm(EstablishmentForm3Type::class, $establishment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($establishment);
            $entityManager->flush();
            dd($establishment);
            return $this->redirectToRoute('establishment_pro_register3', ['id' => $establishment->getId()]);
        }

        return $this->render('establishment/new.html.twig', [
            'establishment' => $establishment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="establishment_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $establishment = new Establishment();
        $form = $this->createForm(EstablishmentType::class, $establishment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($establishment);
            $entityManager->flush();

            return $this->redirectToRoute('establishment_index');
        }

        return $this->render('establishment/new.html.twig', [
            'establishment' => $establishment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="establishment_show", methods={"GET"})
     */
    public function show(Establishment $establishment): Response
    {
        return $this->render('establishment/show.html.twig', [
            'establishment' => $establishment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="establishment_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Establishment $establishment): Response
    {
        $form = $this->createForm(Establishment1Type::class, $establishment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('establishment_index');
        }

        return $this->render('establishment/edit.html.twig', [
            'establishment' => $establishment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="establishment_delete", methods={"POST"})
     */
    public function delete(Request $request, Establishment $establishment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$establishment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($establishment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('establishment_index');
    }





}

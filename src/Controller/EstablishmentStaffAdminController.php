<?php

namespace App\Controller;

use App\Entity\Establishment;
use App\Form\EstablishmentType;
use App\Repository\EstablishmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/establishment/staff/admin")
 */
class EstablishmentStaffAdminController extends AbstractController
{
    /**
     * @Route("/", name="establishment_staff_admin_index", methods={"GET"})
     */
    public function index(EstablishmentRepository $establishmentRepository): Response
    {
        return $this->render('establishment_staff_admin/index.html.twig', [
            'establishments' => $establishmentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="establishment_staff_admin_new", methods={"GET","POST"})
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

            return $this->redirectToRoute('establishment_staff_admin_index');
        }

        return $this->render('establishment_staff_admin/new.html.twig', [
            'establishment' => $establishment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="establishment_staff_admin_show", methods={"GET"})
     */
    public function show(Establishment $establishment): Response
    {
        return $this->render('establishment_staff_admin/show.html.twig', [
            'establishment' => $establishment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="establishment_staff_admin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Establishment $establishment): Response
    {
        $form = $this->createForm(EstablishmentType::class, $establishment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('establishment_staff_admin_index');
        }

        return $this->render('establishment_staff_admin/edit.html.twig', [
            'establishment' => $establishment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="establishment_staff_admin_delete", methods={"POST"})
     */
    public function delete(Request $request, Establishment $establishment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$establishment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($establishment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('establishment_staff_admin_index');
    }
}

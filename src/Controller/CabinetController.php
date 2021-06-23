<?php

namespace App\Controller;

use App\Entity\Office;
use App\Form\OfficeType;
use App\Repository\OfficeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cabinet")
 */
class CabinetController extends AbstractController
{
    /**
     * @Route("/", name="cabinet_index", methods={"GET"})
     */
    public function index(OfficeRepository $officeRepository): Response
    {
        return $this->render('cabinet/index.html.twig', [
            'offices' => $officeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cabinet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $office = new Office();
        $form = $this->createForm(OfficeType::class, $office);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($office);
            $entityManager->flush();

            return $this->redirectToRoute('cabinet_index');
        }

        return $this->render('Contact/People/Admin/add_office.html.twig', [
            'office' => $office,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cabinet_show", methods={"GET"})
     */
    public function show(Office $office): Response
    {
        return $this->render('cabinet/show.html.twig', [
            'office' => $office,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cabinet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Office $office): Response
    {
        $form = $this->createForm(OfficeType::class, $office);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cabinet_index');
        }

        return $this->render('cabinet/edit.html.twig', [
            'office' => $office,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cabinet_delete", methods={"POST"})
     */
    public function delete(Request $request, Office $office): Response
    {
        if ($this->isCsrfTokenValid('delete' . $office->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($office);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cabinet_index');
    }
}

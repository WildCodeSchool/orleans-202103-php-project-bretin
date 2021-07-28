<?php

namespace App\Controller;

use App\Entity\Office;
use App\Entity\Picture;
use App\Form\OfficeType;
use App\Form\PictureType;
use App\Repository\OfficeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/cabinet")
 */
class CabinetController extends AbstractController
{
    /**
     * @Route("/", name="cabinet_index", methods={"GET"})
     */
    public function index(OfficeRepository $officeRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('accueil');
        }

        return $this->render('Contact/People/Admin/office_index.html.twig', [
            'offices' => $officeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/ajout", name="cabinet_new", methods={"GET","POST"})
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

            $this->addFlash('success', 'Le cabinet a bien été ajouté.');

            return $this->redirectToRoute('cabinet_new');
        }

        return $this->render('Contact/People/Admin/add_office.html.twig', [
            'office' => $office,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/photo/{id}", name="pic_new", methods={"GET","POST"})
     */
    public function newpic(Request $request, Office $office): Response
    {
        $picture = new Picture();

        $form = $this->createForm(PictureType::class, $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $picture->setOffice($office);
            $entityManager->persist($picture);
            $entityManager->flush();

            $this->addFlash('success', 'Le cabinet a bien été ajouté.');

            return $this->redirectToRoute('cabinet_index');
        }

        return $this->render('cabinet/edit_picture.html.twig', [
            'picture' => $picture,
            'form' => $form->createView(),
        ]);
    }

      /**
     * @Route("/photo/{id}/modification", name="cabinet_picture_edit", methods={"GET","POST"})
     */
    public function editPicture(Request $request, Picture $picture): Response
    {
        $form = $this->createForm(PictureType::class, $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cabinet_index');
        }

        return $this->render('cabinet/edit_picture.html.twig', [
            'picture' => $picture,
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
     * @Route("/{id}/modification", name="cabinet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Office $office): Response
    {
        $form = $this->createForm(OfficeType::class, $office);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Le cabinet a bien été modifié.');
            return $this->redirectToRoute('cabinet_index');
        }

        return $this->render('Contact/People/Admin/edit_office.html.twig', [
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

        /**
     * @Route("/photo/delete/{id}", name="pic_delete", methods={"POST"})
     */
    public function picdelete(Request $request, Picture $picture): Response
    {
        if ($this->isCsrfTokenValid('delete' . $picture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($picture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cabinet_index');
    }
}

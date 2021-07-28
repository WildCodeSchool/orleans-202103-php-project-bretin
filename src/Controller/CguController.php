<?php

namespace App\Controller;

use App\Repository\OfficeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/cgu", name="cgu")
 */


class CguController extends AbstractController
{
    /**
     * @Route("/", name="")
     */
    public function index(OfficeRepository $officeRepository): Response
    {
        $offices = $officeRepository->findAll();
        return $this->render('cgu/index.html.twig', [
            'offices' => $offices,
        ]);
    }
}

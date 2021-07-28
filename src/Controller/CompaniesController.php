<?php

namespace App\Controller;

use App\Repository\OfficeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CompaniesController extends AbstractController
{
    /**
     * @Route("/entreprises", name="entreprises")
     */
    public function index(OfficeRepository $officeRepository): Response
    {
        return $this->render('Companies/index.html.twig', [
            'offices' => $officeRepository->findAll(),
        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\OfficeRepository;
use App\Repository\ServiceRepository;
use App\Repository\TestimonyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndividualsController extends AbstractController
{
    /**
     * @Route("/particuliers", name="particuliers")
     */
    public function index(
        serviceRepository $serviceRepository,
        testimonyRepository $testimonyRepository,
        OfficeRepository $officeRepository
    ): Response {
        return $this->render('Individuals/index.html.twig', [ "services" => $serviceRepository->findAll(),
        "testimonies" => $testimonyRepository->findBy([], ['date' => 'DESC']),
        'offices' => $officeRepository->findAll(),
        ]);
    }
}

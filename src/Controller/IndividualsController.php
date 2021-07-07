<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServiceRepository;

class IndividualsController extends AbstractController
{
    /**
     * @Route("/particuliers", name="particuliers")
     */
    public function index(serviceRepository $serviceRepository): Response
    {
        return $this->render('Individuals/index.html.twig', [ "services" => $serviceRepository->findAll()]);
    }
}

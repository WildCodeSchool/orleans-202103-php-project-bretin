<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Office;
use App\Repository\OfficeRepository;

class ContactController extends AbstractController
{

    /**
     * @Route("/contact", name="contact_")
     */

    public function index(OfficeRepository $office): Response
    {
        return $this->render('home/contact.html.twig', ['offices' => $office->findAll(),
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Office;

class ContactController extends AbstractController
{

    /**
     * @Route("/contact", name="contact_")
     */

    public function index(): Response
    {
        return $this->render('home/contact.html.twig', ['offices' => self::getOffices($this),
        ]);
    }

    private static function getOffices(ContactController $thisCollection): array
    {
        return $thisCollection->getDoctrine()
        ->getRepository(Office::class)
        ->findAll();
    }
}

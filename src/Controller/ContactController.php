<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Picture;

const OFFICE_1 = "cabinet 1";
const OFFICE_2 = "cabinet 2";

class ContactController extends AbstractController
{

    /**
     * @Route("/contact", name="contact_")
     */

    public function index(): Response
    {
        return $this->render('home/contact.html.twig', ['cabinet1' => self::getPics($this, OFFICE_1),
        'cabinet2' => self::getPics($this, OFFICE_2)
        ]);
    }


    private static function getPics(ContactController $thisCollection, string $param): array
    {
        return $thisCollection->getDoctrine()
        ->getRepository(Picture::class)
        ->findBy(['name' => $param]);
    }
}

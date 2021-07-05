<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndividualsController extends AbstractController
{
    /**
     * @Route("/particuliers", name="individuals")
     */
    public function index(): Response
    {
        return $this->render('Individuals/index.html.twig');
    }
}

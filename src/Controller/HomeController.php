<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="biography")
     * @return Response
     */
    public function index(): Response
    {
        $biography = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy([]);
        return $this->render('home/index.html.twig', ['biography' => $biography]);
    }
}

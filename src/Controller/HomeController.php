<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\EducationRepository;
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
    public function index(UserRepository $userRepository, EducationRepository $educationRepository): Response
    {
        $biography = $userRepository->findOneBy([]);
        $education = $educationRepository->findBy([], ['obtentionYear' => 'DESC']);
        return $this->render('home/index.html.twig', [
            'biography' => $biography,
            'educations' => $education
        ]);
    }
}

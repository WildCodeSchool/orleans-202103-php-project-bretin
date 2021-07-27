<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\AdminUserRepository;
use App\Repository\EducationRepository;
use App\Repository\OfficeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     * @return Response
     */
    public function index(
        AdminUserRepository $userRepository,
        EducationRepository $educationRepository,
        OfficeRepository $officeRepository
    ): Response {
        $user = $userRepository->findOneBy([]);
        $education = $educationRepository->findBy([], ['obtentionYear' => 'DESC']);
        $office = $officeRepository->findAll();
        return $this->render('home/index.html.twig', [
            'user' => $user,
            'educations' => $education,
            'offices' => $office,
        ]);
    }
}

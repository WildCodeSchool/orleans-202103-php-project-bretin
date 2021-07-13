<?php

namespace App\Controller;

use App\Entity\AdminUser;
use App\Entity\Account;
use App\Form\AccountType;
use App\Form\UserType;
use App\Repository\AdminUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
      /**
     * @Route("/reset", name="user_reset_index")
     */
    public function reset(AdminUserRepository $userRepository, Request $request): Response
    {
        $accountSearched = new Account();
        $form = $this->createForm(AccountType::class, $accountSearched);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $account = $userRepository->findOneBy([
                'email' => $accountSearched->getEmail(),
            ]);

            if ($account === null) {
                $this->setError("Cette adresse email est inconnue.");
            } else {
                $pass1 = $accountSearched->GetNewPassword();
                $pass2 = $accountSearched->getConfirmNewPassword();

                if ($pass1 === $pass2) {
                        $entityManager = $this->getDoctrine()->getManager();
                        $account->setPassword($this->passwordEncoder->encodePassword(
                            $account,
                            $pass1
                        ));
                        $entityManager->persist($account);
                        $entityManager->flush();
                        $this->addFlash('success', 'Le mot de passe administrateur a bien été réinitialisé.');
                        return $this->redirectToRoute('app_login');
                } else {
                        $this->setError("Les deux mots de passe saisis doivent être identiques !");
                }
            }
        }

        return $this->render('user/new_password.html.twig', [
            'users' => $userRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(AdminUserRepository $userRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('accueil');
        }
        return $this->render('home/Admin/index_biography.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = new AdminUser();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(AdminUser $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AdminUser $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'la biographie à bien été modifiée.');
            return $this->redirectToRoute('user_index');
        }

        return $this->render('home/Admin/edit_biography.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"POST"})
     */
    public function delete(Request $request, AdminUser $user): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    private function setError(string $errorMessage): void
    {
        echo "<br><div class='alert alert-danger' role='alert'>{$errorMessage}</div>";
    }
}

<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Office;
use App\Form\ContactType;
use App\Repository\OfficeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{

    /**
     * @Route("/contact", name="contact_")
     */

    public function index(OfficeRepository $office, Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mail = $contact->getMail();
            $email = (new Email())
            ->from($mail)
            ->to(strval($this->getParameter('mailer_to')))
            ->subject('Informations après remplissage du formulaire de contact entreprise')
            ->html($this->renderView('Components/email.html.twig', ['contact' => $contact]));
            $mailer->send($email);

            $this->addFlash('success', 'Votre e-mail a été transmis');
            return $this->redirectToRoute('contact_');
        }

        return $this->render('Contact/People/contact.html.twig', ['offices' => $office->findAll(),
            'form' => $form->createView()
        ]);
    }
}

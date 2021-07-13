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
            $civility = $contact->getCivility();
            $lastname = $contact->getLastname();
            $firstname = $contact->getFirstname();
            $mail = $contact->getMail();
            $businessName = $contact->getBusinessName();
            $job = $contact->getJob();
            $situation = $contact->getSituation();
            $need = $contact->getNeed();
            $urgent = $contact->getUrgent();
            $urgentResponse = $contact->getUrgentResponse();
            $intervention = $contact->getIntervention();
            $constraint = $contact->getConstraint();
            $availability = $contact->getAvailability();
            $message = $civility . '<br>' . $lastname . '<br>' . $firstname . '<br>' . $mail . '<br>' . $businessName;
            $message .= '<br>' . $job . '<br>' . $situation . '<br>' . $need . '<br>' . $urgent;
            $message .= $urgentResponse . '<br>' . $intervention . '<br>' . $constraint . '<br>' . $availability;
            $email = (new Email())
            ->from($mail)
            ->to(strval($this->getParameter('mailer_to')))
            ->subject('Informations après remplissage du formulaire de contact entreprise')
            ->html($message);
            $mailer->send($email);
        }

        return $this->render('Contact/People/contact.html.twig', ['offices' => $office->findAll(),
            'form' => $form->createView()
        ]);
    }
}

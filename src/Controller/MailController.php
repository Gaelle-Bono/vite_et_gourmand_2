<?php

namespace App\Controller;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MailController extends AbstractController
{
    #[Route('/send-mail', name: 'send_mail')]
    public function sendMail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('no-reply@monsite.com')
            ->to('toto@example.com')
            ->subject('Test Email depuis Symfony')
            ->text('Test Test Test.')
            ->html('<p>Ceci est un <strong>email de test</strong> envoyé avec Symfony et Mailtrap.</p>');

        $mailer->send($email);

        return new Response('Email envoyé avec succès !');
    }
}
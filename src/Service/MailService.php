<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use App\Entity\User;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;


class MailService
{
    public function __construct(
        private MailerInterface $mailer
    ) {}

    public function sendMail(User $user, string $subject, string $template, array $context = [])
    {

        $email = (new TemplatedEmail())
            ->from('noreply@vite-et-gourmand.com')
            ->to($user->getEmail())
            ->subject($subject)
            ->htmlTemplate($template)
            ->context($context);

        // try 
        // {
        $this->mailer->send($email);
        // } catch (\Exception $e) {
        //     return new Response('Erreur durant l\'envoi du mail: ' . $e->getMessage());
        // }    
    }
}
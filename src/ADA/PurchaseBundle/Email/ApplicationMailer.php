<?php
// src/OC/PlatformBundle/Email/ApplicationMailer.php

namespace ADA\PurchaseBundle\Email;

use ADA\PurchaseBundle\Entity\Ticket;

class ApplicationMailer
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendNewNotification(Ticket $ticket)
    {
        $message = new \Swift_Message(
            'Nouvelle candidature',
            'Vous avez reçu une nouvelle candidature.'
        );

        $message
            ->addTo($ticket->getEmail())
            ->addFrom('admin@votresite.com')
        ;

        $this->mailer->send($message);
    }
}

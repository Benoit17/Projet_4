<?php
// src/OC/PlatformBundle/Email/ApplicationMailer.php

namespace ADA\PurchaseBundle\Email;

use ADA\PurchaseBundle\Entity\Customer;

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

    public function sendNewNotification(Customer $customer)
    {
        $message = new \Swift_Message(
            'Nouvelle candidature',
            'Vous avez reçu une nouvelle candidature.'
        );

        $message
            ->addTo($customer->getEmail()) // Ici bien sûr il faudrait un attribut "email", j'utilise "author" à la place
            ->addFrom('admin@votresite.com')
        ;

        $this->mailer->send($message);
    }
}

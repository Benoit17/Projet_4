<?php

namespace ADA\PurchaseBundle\Email;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use ADA\PurchaseBundle\Entity\Ticket;


class ApplicationMailer

{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    private $templating;

    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendNewNotification(Ticket $ticket)
    {
        $message = (new \Swift_Message('Louvre'))
            ->setFrom('send@example.com')
            ->setTo($ticket->getEmail())
            ->setBody(
                $this->templating->render('ADAPurchaseBundle:Emails:registration.html.twig', array('ticket' => $ticket)),
                'text/html'
            );

        $this->mailer->send($message);
    }

}
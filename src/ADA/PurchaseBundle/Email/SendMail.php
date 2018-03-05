<?php

namespace ADA\PurchaseBundle\Email;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use ADA\PurchaseBundle\Entity\Ticket;


class SendMail
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

    public function sendMail(Ticket $ticket)
    {
        if(strpos($_SERVER['REQUEST_URI'], 'en') !== false) {
            $message = (new \Swift_Message('Ticket'))
                ->setFrom('send@example.com')
                ->setTo($ticket->getEmail())
                ->setBody(
                    $this->templating->render('ADAPurchaseBundle:Emails:registration.html.twig', array('ticket' => $ticket)),
                    'text/html'
                );

            $this->mailer->send($message);
        }
        else{
            $message = (new \Swift_Message('Billet'))
                ->setFrom('send@example.com')
                ->setTo($ticket->getEmail())
                ->setBody(
                    $this->templating->render('ADAPurchaseBundle:Emails:registration.html.twig', array('ticket' => $ticket)),
                    'text/html'
                );

            $this->mailer->send($message);
        }
    }

}
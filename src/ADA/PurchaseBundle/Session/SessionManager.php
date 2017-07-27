<?php


namespace ADA\PurchaseBundle\Session;

use ADA\PurchaseBundle\Entity\Ticket;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class SessionManager
{
    private $em;
    private $session;

    /**
     * SessionManager constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em, Session $session)
    {
        $this->em = $em;
        $this->session = $session;
    }

    /**
     * @param Ticket $ticket
     */
    public function setSessionTicket(Ticket $ticket)
    {
        $this->session->set('tmpTicket', $ticket);
    }

    /**
     * @return mixed|null
     */
    public function getSessionTicket()
    {
        if ($this->session->get('tmpTicket')) {
            $ticket = $this->session->get('tmpTicket');
        } else {
            return null;
        }
        return $ticket;
    }

    /**
     * @param Ticket $ticket
     */
    public function saveTicket(Ticket $ticket)
    {
        $this->em->persist($ticket);
        $this->em->flush();
        $this->session->remove('tmpTicket');
    }
}
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
        // stocke un attribut pour la réutilisation durant une prochaine requête utilisateur.
        $this->session->set('tmpTicket', $ticket);
    }

    public function getSessionTicket()
    {
        // récupère un attribut fixé par un autre contrôleur dans une autre requête
        return $this->session->get('tmpTicket');
    }

    /**
     * @param Ticket $ticket
     */
    public function saveTicket(Ticket $ticket)
    {
        $this->em->persist($ticket);
        $this->em->flush();
    }
}
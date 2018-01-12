<?php

namespace ADA\PurchaseBundle\Edit;

use ADA\PurchaseBundle\Entity\Ticket;
use ADA\PurchaseBundle\Form\TicketType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class EditManager
{
    private $validator;

    /**
     * EditManager constructor.
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator) {
        
        $this->validator = $validator;
        
    }

    public function validateTicket(Ticket $ticket)
    {
        $errors = $this->validator->validate($ticket);
        if (count($errors) > 0) {
            $errorsString = "";
            foreach ($errors as $error) {
                $errorsString .=$error->getmessage().'<br>';
            }
            return $errorsString;
        }
        return true;
    }
    
}

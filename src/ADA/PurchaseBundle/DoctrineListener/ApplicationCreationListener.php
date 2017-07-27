<?php

namespace ADA\PurchaseBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use ADA\PurchaseBundle\Email\ApplicationMailer;
use ADA\PurchaseBundle\Entity\Ticket;

class ApplicationCreationListener
{
    /**
     * @var ApplicationMailer
     */
    private $applicationMailer;

    public function __construct(ApplicationMailer $applicationMailer)
    {
        $this->applicationMailer = $applicationMailer;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        
        if (!$entity instanceof Ticket) {
            return;
        }

        $this->applicationMailer->sendNewNotification($entity);
    }
}

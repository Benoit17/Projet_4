<?php

namespace Purchase\PlatformBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Purchase\PlatformBundle\Email\ApplicationMailer;
use Purchase\PlatformBundle\Entity\User;

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

        // On ne veut envoyer un email que pour les entités Application
        if (!$entity instanceof User) {
            return;
        }

        $this->applicationMailer->sendNewNotification($entity);
    }
}

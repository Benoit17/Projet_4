<?php

namespace ADA\PurchaseBundle\Price;

use ADA\PurchaseBundle\Entity\Ticket;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;


class PriceManager
{

    private $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function getAge(\DateTime $date)
    {
        $age = $date->diff(new \DateTime());
        return $age->y;
    }

    /**
     *
     * @param Ticket $ticket
     *
     */
    public function getTotalPriceTicket(Ticket $ticket)
    {
        foreach ($ticket->getCustomers() as $customer) {
            if ($customer->getReduce() === true) {
                $price = $this->container->getParameter('ada_purchase.reduce');
                $customer->setPrice($price);
            } elseif ($this->getAge($customer->getBirthDate()) < 4) {
                $price = $this->container->getParameter('ada_purchase.babyPrice');
                $customer->setPrice($price);

            } elseif ($this->getAge($customer->getBirthDate()) >= 4 AND $this->getAge($customer->getBirthDate()) < 12) {
                $price = $this->container->getParameter('ada_purchase.childPrice');
                $customer->setPrice($price);

            } elseif ($this->getAge($customer->getBirthDate()) >= 12 AND $this->getAge($customer->getBirthDate()) < 60) {
                $price = $this->container->getParameter('ada_purchase.normalPrice');
                $customer->setPrice($price);

            } elseif ($this->getAge($customer->getBirthDate()) > 60) {
                $price = $this->container->getParameter('ada_purchase.seniorPrice');
                $customer->setPrice($price);
            }
        }
        $totalPrice = 0;
        foreach ($ticket->getCustomers() as $customer) {
            $totalPrice += $customer->getPrice();
        }
        $ticket->setTotalPrice($totalPrice);
    }
}


<?php


namespace ADA\PurchaseBundle\Price;

use ADA\PurchaseBundle\Entity\Ticket;


class PriceManager
{
    /**
     *
     * @param Ticket $ticket
     *
     */
    public function getTotalPriceTicket(Ticket $ticket)
    {
        $totalPrice = 0;
        foreach ($ticket->getCustomers() as $customer) {
            $totalPrice += $customer->getPrice();
        }
        $ticket->setTotalPrice($totalPrice);
    }
}
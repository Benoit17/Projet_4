<?php
namespace Tests\ADA\PurchaseBundle\Price;

use ADA\PurchaseBundle\Entity\Customer;
use ADA\PurchaseBundle\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class PriceManagerTest extends WebTestCase
{
    public function testGetTotalPriceTicket()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $container = $kernel->getContainer();
        $service = $container->get('ada_purchase.priceManager');

        $customer1 = New Customer();
        $customer1->setReduce(true);

        $customer2 = New Customer();
        $customer2->setBirthDate(new \DateTime('19-03-1989'));

        $ticket = New Ticket();
        $ticket->addCustomer($customer1);
        $ticket->addCustomer($customer2);

        $service->getTotalPriceTicket($ticket);
        $result = $ticket->getTotalPrice();

        $this->assertEquals(26, $result);
    }
}
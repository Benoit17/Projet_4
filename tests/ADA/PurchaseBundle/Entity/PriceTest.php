<?php
namespace Tests\ADA\PurchaseBundle\Entity;

use ADA\PurchaseBundle\Entity\Customer;
use PHPUnit\Framework\TestCase;


class PriceTest extends TestCase
{
    public function testGetPrice()
    {
        $customer = New Customer();
        $result = $customer->setReduce(true)->getPrice();
     
        $this->assertEquals(10, $result);
    }

}
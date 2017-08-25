<?php
namespace Tests\ADA\PurchaseBundle\Entity;

use ADA\PurchaseBundle\Entity\Customer;
use PHPUnit\Framework\TestCase;


class AgeTest extends TestCase
{
    public function testGetAge()
    {
        $customer = New Customer();
        $result = $customer->setBirthDate(new \DateTime('19-03-1989'))->getAge();

        $this->assertEquals(28, $result);
    }
}

